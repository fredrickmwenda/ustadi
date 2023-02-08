<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SchoolClub.
 *
 * @package namespace App\Models;
 */
class SchoolClub extends Model implements Transformable
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
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id', 'id');
    }

    public function matron()
    {
        return $this->belongsTo(Matron::class, 'approved_by', 'id');
    }
    ///has many school club activities
    public function schoolClubActivities()
    {
        return $this->hasMany(SchoolClubActivity::class);
    }

}
