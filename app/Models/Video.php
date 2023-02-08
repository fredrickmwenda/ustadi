<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Video.
 *
 * @package namespace App\Models;
 */
class Video extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

      /**
     * Parent resource. The resource this video is related/ belongs to.
     */
    public function resource()
    {
        # code...
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }

}
