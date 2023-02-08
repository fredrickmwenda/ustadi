<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Student.
 *
 * @package namespace App\Models;
 */
class Student extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'student_clubs', 'student_id', 'club_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
