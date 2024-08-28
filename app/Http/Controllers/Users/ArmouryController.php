<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Character\Character;
use App\Models\Claymore\GearCategory;
use App\Models\Claymore\WeaponCategory;
use App\Models\User\User;
use App\Models\User\UserGear;
use App\Models\User\UserWeapon;
use App\Services\Claymore\WeaponManager;
use Auth;
use Illuminate\Http\Request;

class ArmouryController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Armoury Controller
    |--------------------------------------------------------------------------
    |
    | Handles armoury management for the user.
    |
    */

    /**
     * Shows the user's armoury page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getArmoury() {
        $gear_categories = GearCategory::orderBy('sort', 'DESC')->get();
        $gears = count($gear_categories) ? Auth::user()->gears()->orderByRaw('FIELD(gear_category_id,'.implode(',', $gear_categories->pluck('id')->toArray()).')')->orderBy('name')->orderBy('updated_at')->get()->groupBy('gear_category_id') : Auth::user()->gears()->orderBy('name')->orderBy('updated_at')->get()->groupBy('gear_category_id');

        $weapon_categories = WeaponCategory::orderBy('sort', 'DESC')->get();
        $weapons = count($weapon_categories) ? Auth::user()->weapons()->orderByRaw('FIELD(weapon_category_id,'.implode(',', $weapon_categories->pluck('id')->toArray()).')')->orderBy('name')->orderBy('updated_at')->get()->groupBy('weapon_category_id') : Auth::user()->weapons()->orderBy('name')->orderBy('updated_at')->get()->groupBy('weapon_category_id');

        return view('home.armoury', [
            'user'              => Auth::user(),
            'gears'             => $gears,
            'weapons'           => $weapons,
            'userOptions'       => User::visible()->where('id', '!=', Auth::user()->id)->orderBy('name')->pluck('name', 'id')->toArray(),
            'gear_categories'   => $gear_categories->keyBy('id'),
            'weapon_categories' => $weapon_categories->keyBy('id'),
        ]);
    }

    /**
     * Shows the equipment stack modal.
     *
     * @param int   $id
     * @param mixed $type
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getStack(Request $request, $type, $id) {
        if ($type == 'gear') {
            $stack = UserGear::withTrashed()->where('id', $id)->with('gear')->first();
        } else {
            $stack = UserWeapon::withTrashed()->where('id', $id)->with('weapon')->first();
        }
        $chara = Character::where('user_id', $stack->user_id)->pluck('slug', 'id');

        $readOnly = $request->get('read_only') ?: ((Auth::check() && $stack && !$stack->deleted_at && ($stack->user_id == Auth::user()->id || Auth::user()->hasPower('edit_inventories'))) ? 0 : 1);

        return view('home._armoury_stack', [
            'stack'       => $stack,
            'chara'       => $chara,
            'user'        => Auth::user(),
            'userOptions' => ['' => 'Select User'] + User::visible()->where('id', '!=', $stack ? $stack->user_id : 0)->orderBy('name')->get()->pluck('verified_name', 'id')->toArray(),
            'readOnly'    => $readOnly,
            'type'        => $type,
            'displayType' => ucfirst($type == 'weapons' ? 'weapon' : $type),
        ]);
    }

    /**
     * Transfers an equipment stack to another user.
     *
     * @param int   $id
     * @param mixed $type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postTransfer(Request $request, $type, $id) {
        $service = ($type == 'gear' ? new GearManager : new WeaponManager);
        if ($service->transferStack(
            Auth::user(),
            User::visible()->where('id', $request->get('user_id'))->first(),
            $type == 'gear' ? UserGear::find($id) : UserWeapon::find($id)
        )) {
            flash('Gear transferred successfully.')->success();
        } else {
            foreach ($service->errors()->getMessages()['error'] as $error) {
                flash($error)->error();
            }
        }

        return redirect()->back();
    }

    /**
     * Deletes an equipment stack.
     *
     * @param int   $id
     * @param mixed $type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete(Request $request, $type, $id) {
        $service = ($type == 'gear' ? new GearManager : new WeaponManager);
        if ($service->deleteStack(
            Auth::user(),
            $type == 'gear' ? UserGear::find($id) : UserWeapon::find($id)
        )) {
            flash('Gear deleted successfully.')->success();
        } else {
            foreach ($service->errors()->getMessages()['error'] as $error) {
                flash($error)->error();
            }
        }

        return redirect()->back();
    }

    /**
     * Attaches an equipment.
     *
     * @param mixed $id
     * @param mixed $type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAttach(Request $request, $type, $id) {
        $service = ($type == 'gear' ? new GearManager : new WeaponManager);
        if ($service->attachStack(
            $type == 'gear' ? UserGear::find($id) : UserWeapon::find($id),
            $request->get('id')
        )) {
            flash(ucfirst($type == 'weapons' ? 'weapon' : 'gear').' attached successfully.')->success();
        } else {
            foreach ($service->errors()->getMessages()['error'] as $error) {
                flash($error)->error();
            }
        }

        return redirect()->back();
    }

    /**
     * Detaches an equipment.
     *
     * @param mixed $id
     * @param mixed $type
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDetach(Request $request, $type, $id) {
        $service = ($type == 'gear' ? new GearManager : new WeaponManager);
        if ($service->detachStack($type == 'gear' ? UserGear::find($id) : UserWeapon::find($id))) {
            flash(ucfirst($type == 'weapons' ? 'weapon' : 'gear').' detached successfully.')->success();
        } else {
            foreach ($service->errors()->getMessages()['error'] as $error) {
                flash($error)->error();
            }
        }

        return redirect()->back();
    }

    /**
     * Upgrades an equipment.
     *
     * @param mixed $type
     * @param mixed $id
     */
    public function postUpgrade($type, $id) {
        $equipment = ($type == 'gear' ? UserGear::find($id) : UserWeapon::find($id));
        if (Auth::user()->isStaff && $equipment->user_id != Auth::user()->id) {
            $isStaff = true;
        } else {
            $isStaff = false;
        }

        $service = ($type == 'gear' ? new GearManager : new WeaponManager);
        if ($service->upgrade($equipment, $isStaff)) {
            flash(ucfirst($type == 'weapons' ? 'weapon' : $type).' upgraded successfully.')->success();
        } else {
            foreach ($service->errors()->getMessages()['error'] as $error) {
                flash($error)->error();
            }
        }

        return redirect()->back();
    }

    /**
     * Adds a unique image to an equipment.
     *
     * @param mixed $id
     * @param mixed $type
     */
    public function postImage(Request $request, $type, $id) {
        $equipment = ($type == 'gear' ? UserGear::find($id) : UserWeapon::find($id));
        $data = $request->only(['image']);

        if (!Auth::user()->isStaff) {
            abort(404);
        }

        $service = ($type == 'gear' ? new GearManager : new WeaponManager);
        if ($service->addImage($equipment, $data)) {
            flash(ucfirst($type == 'weapons' ? 'weapon' : $type).' image updated successfully.')->success();
        } else {
            foreach ($service->errors()->getMessages()['error'] as $error) {
                flash($error)->error();
            }
        }

        return redirect()->back();
    }
}
