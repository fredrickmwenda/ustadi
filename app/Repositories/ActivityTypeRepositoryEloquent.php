<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ActivityTypeRepository;
use App\Models\ActivityType;
use App\Validators\ActivityTypeValidator;

/**
 * Class ActivityTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ActivityTypeRepositoryEloquent extends BaseRepository implements ActivityTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ActivityType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ActivityTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
