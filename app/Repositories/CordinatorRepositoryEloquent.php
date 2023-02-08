<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CordinatorRepository;
use App\Models\Cordinator;
use App\Validators\CordinatorValidator;

/**
 * Class CordinatorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CordinatorRepositoryEloquent extends BaseRepository implements CordinatorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cordinator::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CordinatorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
