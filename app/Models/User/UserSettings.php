<?php

namespace App\Models\User;

use App\Models\Model;

class UserSettings extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'is_fto', 'submission_count', 'banned_at', 'ban_reason', 'birthday_setting'
=======
        'is_fto', 'submission_count', 'banned_at', 'ban_reason', 'birthday_setting', 'team_id',
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
    ];

    /**
     * The primary key of the model.
     *
     * @var string
     */
    public $primaryKey = 'user_id';
<<<<<<< HEAD
=======

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_settings';

    /**
     * Dates on the model to convert to Carbon instances.
     *
     * @var array
     */
    protected $dates = ['banned_at'];
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_settings';

    /**
     * Dates on the model to convert to Carbon instances.
     *
     * @var array
     */
    protected $dates = ['banned_at'];

    /**********************************************************************************************
    
        RELATIONS

    **********************************************************************************************/
    
    /**
     * Get the user this set of settings belongs to.
     */
<<<<<<< HEAD
    public function user() 
    {
        return $this->belongsTo('App\Models\User\User');
=======
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    /**
     * Get the team this set of settings belongs to.
     */
    public function team()
    {
        return $this->belongsTo(EventTeam::class, 'team_id');
>>>>>>> parent of fc1f7dde (Merge branch 'extension/claymores-and-companions' of https://github.com/ScuffedNewt/lorekeeper)
    }
}
