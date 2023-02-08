<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Request.
 *
 * @package namespace App\Models;
 */
class Request extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Mentor receiving the request
     */

    public function mentor()
    {
        # code...
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }

     /**
     * Matron sending the request
     */

    public function matron()
    {
        # code...
        return $this->belongsTo(Matron::class, 'matron_id', 'id');
    }

    public function schedules()
    {
        # code...
        return $this->hasMany(Schedule::class, 'request_id', 'id');
    }

    // public function schoolClub()
    // {
    //     # code...
    //     return $this->belongsTo(SchoolClub::class, 'school_club_id', 'id');
    // }

    //belongs to a school
    public function school()
    {
        # code...
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
    // belongs to a school_club_activity
    public function schoolClubActivity()
    {
        # code...
        return $this->belongsTo(SchoolClubActivity::class, 'school_club_activity_id', 'id');
    }

}
