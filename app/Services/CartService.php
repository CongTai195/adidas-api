<?php

namespace App\Services;

use App\Repositories\CartRepository;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function all()
    {
        return $this->cartRepository->all();
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->cartRepository->findByField($field, $value, $columns);
    }
}
