<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

use App\Models\Currency\Currency;
use App\Models\Item\ItemCategory;
use App\Models\Item\Item;
use App\Models\Prompt\PromptCategory;
use App\Models\Prompt\Prompt;

=======
use App\Models\Prompt\PromptCategory;
use App\Models\Prompt\Prompt;

>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
class PromptsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Prompts Controller
    |--------------------------------------------------------------------------
    |
    | Displays information about prompts as entered in the admin panel.
    | Pages displayed by this controller form the Prompts section of the site.
    |
    */

    /**
     * Shows the index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex()
    {
        return view('prompts.index');
    }

    /**
     * Shows the prompt categories page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getPromptCategories(Request $request)
    {
        $query = PromptCategory::query();
        $name = $request->get('name');
        if($name) $query->where('name', 'LIKE', '%'.$name.'%');
<<<<<<< HEAD
        return view('prompts.prompt_categories', [  
=======
        return view('prompts.prompt_categories', [
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
            'categories' => $query->orderBy('sort', 'DESC')->paginate(20)->appends($request->query()),
        ]);
    }

    /**
     * Shows the prompts page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getPrompts(Request $request)
    {
        $query = Prompt::active()->with('category');
        $data = $request->only(['prompt_category_id', 'name', 'sort']);
        if(isset($data['prompt_category_id']) && $data['prompt_category_id'] != 'none') 
            $query->where('prompt_category_id', $data['prompt_category_id']);
<<<<<<< HEAD
        if(isset($data['name'])) 
            $query->where('name', 'LIKE', '%'.$data['name'].'%');

        if(isset($data['sort'])) 
=======
        if(isset($data['name']))
            $query->where('name', 'LIKE', '%'.$data['name'].'%');

        if(isset($data['sort']))
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
        {
            switch($data['sort']) {
                case 'alpha':
                    $query->sortAlphabetical();
                    break;
                case 'alpha-reverse':
                    $query->sortAlphabetical(true);
                    break;
                case 'category':
                    $query->sortCategory();
                    break;
                case 'newest':
                    $query->sortNewest();
                    break;
                case 'oldest':
                    $query->sortOldest();
                    break;
                case 'start':
                    $query->sortStart();
                    break;
                case 'start-reverse':
                    $query->sortStart(true);
                    break;
                case 'end':
                    $query->sortEnd();
                    break;
                case 'end-reverse':
                    $query->sortEnd(true);
                    break;
            }
<<<<<<< HEAD
        } 
=======
        }
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
        else $query->sortCategory();

        return view('prompts.prompts', [
            'prompts' => $query->paginate(20)->appends($request->query()),
            'categories' => ['none' => 'Any Category'] + PromptCategory::orderBy('sort', 'DESC')->pluck('name', 'id')->toArray()
        ]);
    }
}
