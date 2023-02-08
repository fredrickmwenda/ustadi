<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\clubRepository;
use App\Models\Club;
use App\Validators\ClubValidator;

/**
 * Class ClubRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClubRepositoryEloquent extends BaseRepository implements ClubRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Club::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ClubValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
