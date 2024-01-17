<?php

namespace App\Models\Level;

use App\Models\Model;

class UserLevel extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'current_level', 'current_exp', 'current_points', 'stamina', 'character_id', 'arena_wins', 'arena_losses',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_levels';

    /**********************************************************************************************

        RELATIONS

    **********************************************************************************************/

    public function user() {
        return $this->belongsTo('App\Models\User\User');
    }

    public function character() {
        return $this->belongsTo('App\Models\Character\Character');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level\Level', 'current_level');
    }

    /**********************************************************************************************

        ATTRIBUTES

    **********************************************************************************************/

    /**
     * Get current stamina as a progress bar width.
     */
    public function getStaminaProgressAttribute() {
        return ($this->stamina / 15) * 100;
    }
}
