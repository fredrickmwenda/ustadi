<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ScheduleRepository;
use App\Models\Schedule;
use App\Validators\ScheduleValidator;

/**
 * Class ScheduleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ScheduleRepositoryEloquent extends BaseRepository implements ScheduleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Schedule::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ScheduleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
