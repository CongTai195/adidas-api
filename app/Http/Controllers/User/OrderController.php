<?php

namespace App\Http\Controllers\User;

use App\Services\OrderService;

class OrderController
{
    protected $orderService;

    public function __contruct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
}
