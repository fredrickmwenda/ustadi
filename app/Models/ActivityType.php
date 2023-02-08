<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ActivityType.
 *
 * @package namespace App\Models;
 */
class ActivityType extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function activities(Type $var = null)
    {
        # code...
        return $this->hasMany(ClubActivity::class, 'activity_type_id', 'id');
    }

}
