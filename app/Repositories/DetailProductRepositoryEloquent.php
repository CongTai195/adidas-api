<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DetailProductRepository;
use App\Entities\DetailProduct;
use App\Validators\DetailProductValidator;

/**
 * Class DetailProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DetailProductRepositoryEloquent extends BaseRepository implements DetailProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DetailProduct::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
