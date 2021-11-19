<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderRepository;
use App\Entities\Order;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class OrderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Order::class;
    }


    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function calculate()
    {
        return $this->model
            ->selectRaw('product_id, SUM(quantity) as quantity, SUM(products.price * quantity) as price')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->groupBy('product_id')
            ->orderBy('product_id')
            ->get();
    }
}
