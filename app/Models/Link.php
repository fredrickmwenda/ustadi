<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Link.
 *
 * @package namespace App\Models;
 */
class Link extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

      /**
     * Parent resource. The resource this link is related/ belongs to.
     */
    public function resource()
    {
        # code...
        return $this->belongsTo(Resource::class, 'resource_id', 'id');
    }

}
