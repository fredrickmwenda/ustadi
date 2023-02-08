<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClubActivityRepository;
use App\Models\ClubActivity;
use App\Validators\ClubActivityValidator;

/**
 * Class ClubActivityRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClubActivityRepositoryEloquent extends BaseRepository implements ClubActivityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ClubActivity::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ClubActivityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
