<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MatronRepository;
use App\Models\Matron;
use App\Validators\MatronValidator;

/**
 * Class MatronRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MatronRepositoryEloquent extends BaseRepository implements MatronRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Matron::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
