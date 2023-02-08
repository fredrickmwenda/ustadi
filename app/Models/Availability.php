<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Availability.
 *
 * @package namespace App\Models;
 */
class Availability extends Model implements Transformable
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
        # code...
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }

}
