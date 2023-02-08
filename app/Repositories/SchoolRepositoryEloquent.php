<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\schoolRepository;
use App\Entities\School;
use App\Validators\SchoolValidator;

/**
 * Class SchoolRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SchoolRepositoryEloquent extends BaseRepository implements SchoolRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return School::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SchoolValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
