<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SchoolClubRepository;
use App\Models\SchoolClub;
use App\Validators\SchoolClubValidator;

/**
 * Class SchoolClubRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SchoolClubRepositoryEloquent extends BaseRepository implements SchoolClubRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SchoolClub::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SchoolClubValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
