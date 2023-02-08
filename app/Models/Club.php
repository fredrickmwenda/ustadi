<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Club.
 *
 * @package namespace App\Models;
 */
class Club extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    //All students belonging to this club
    public function students()
    {
        # code...
        return $this->belongsToMany(Student::class, 'student_clubs', 'student_id', 'club_id');
    }

    //Activities attached to the club
    public function activities()
    {
        # code...
        return $this->hasMany(ClubActivity::class, 'club_id', 'id');
    }

    //All schools that have/ have selected this club
    public function schools()
    {
        # code...
        return $this->belongsToMany(School::class, 'school_clubs', 'club_id', 'school_id');
    }

}
