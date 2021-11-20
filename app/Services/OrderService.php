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

    public function insert(array $attributes)
    {
        return $this->orderRepository->insert($attributes);
    }

    public function delete($id)
    {
        return $this->orderRepository->where('transaction_id', $id)->delete();
    }

    public function detailBudget()
    {
        return $this->orderRepository->calculate();
    }

    public function calculateMonth($month, $year)
    {
        return $this->orderRepository->calculateMonth($month, $year);
    }
}
