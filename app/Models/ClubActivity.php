<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ClubActivity.
 *
 * @package namespace App\Models;
 */
class ClubActivity extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function activityType()
    {
        return $this->belongsTo(ActivityType::class, 'activity_type_id', 'id');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }


}
