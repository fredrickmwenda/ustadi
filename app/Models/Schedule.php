<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Schedule.
 *
 * @package namespace App\Models;
 */
class Schedule extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }

    /**
     * A schedule is created from a request, once approved.
     */
    public function request()
    {
        # code...
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }

}
