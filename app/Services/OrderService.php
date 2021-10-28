<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function all()
    {
        return $this->orderRepository->with(['product'])->all();
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->orderRepository->with(['product'])->findByField($field, $value, $columns);
    }
}
