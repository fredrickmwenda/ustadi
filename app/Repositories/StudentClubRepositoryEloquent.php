<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StudentClubRepository;
use App\Models\StudentClub;
use App\Validators\StudentClubValidator;

/**
 * Class StudentClubRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StudentClubRepositoryEloquent extends BaseRepository implements StudentClubRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StudentClub::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StudentClubValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
