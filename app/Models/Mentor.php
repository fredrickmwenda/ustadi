<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;

/**
 * Class Mentor.
 *
 * @package namespace App\Models;
 */
class Mentor extends Model implements Transformable
{
    use TransformableTrait, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Requests belonging to this mentor
     */

    public function requests()
    {
        # code...
        return $this->hasMany(Request::class, 'mentor_id', 'id');
    }

    /**
     * Availabilities belonging to this mentor: Max should be two (weeekely and daily)
     */

    public function availabilities(){
        # code...
        return $this->hasMany(Availability::class, 'mentor_id', 'id');
    }

    public function schedule()
    {
        # code...
        return $this->hasMany(Schedule::class, 'mentor_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

}
