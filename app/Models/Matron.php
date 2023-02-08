<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Matron.
 *
 * @package namespace App\Models;
 */
class Matron extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function school()
    {
        # code...
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function requests()
    {
        # code...
        return $this->hasMany(Request::class, 'matron_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function schoolClub()
    {
        # code...
        return $this->hasMany(SchoolClub::class, 'approved_by', 'id');
    }



}
