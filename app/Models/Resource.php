<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Resource.
 *
 * @package namespace App\Models;
 */
class Resource extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * The mentor who posted the resource.
     */

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'from_id', 'id');
    }

      /**
     * The school/ club receiving the resource.
     * Not sure whether send these to clubs or just the school.
     */

    public function school()
    {
        return $this->belongsTo(School::class, 'to_id', 'id');
    }

}
