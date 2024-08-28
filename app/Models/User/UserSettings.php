<?php

namespace App\Models\User;

use App\Models\EventTeam;
use App\Models\Model;

class UserSettings extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'is_fto', 'submission_count', 'banned_at', 'ban_reason', 'birthday_setting', 'team_id',
=======
        'is_fto', 'submission_count', 'banned_at', 'ban_reason', 'birthday_setting',
        'deactivate_reason', 'deactivated_at',
>>>>>>> 0e64f5bf38b88c74c42555e1a3de7429f927474e
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_settings';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'banned_at'      => 'datetime',
        'deactivated_at' => 'datetime',
    ];

    /**
     * The primary key of the model.
     *
     * @var string
     */
    public $primaryKey = 'user_id';

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
    public function user() {
        return $this->belongsTo(User::class);
>>>>>>> 0e64f5bf38b88c74c42555e1a3de7429f927474e
    }

    /**
     * Get the team this set of settings belongs to.
     */
    public function team()
    {
        return $this->belongsTo(EventTeam::class, 'team_id');
    }
}
