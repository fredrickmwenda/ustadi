<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School.
 *
 * @package namespace App\Models;
 */
class School extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    //use table schools
    protected $table = 'schools';

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'school_clubs', 'school_id', 'club_id');
    }


    //a school has one location
    public function location()
    {
        return $this->belongsTo(Location::class, 'county_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
