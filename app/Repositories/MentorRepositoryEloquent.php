<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\mentorRepository;
use App\Models\Mentor;
use App\Validators\MentorValidator;

/**
 * Class MentorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MentorRepositoryEloquent extends BaseRepository implements MentorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mentor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MentorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
