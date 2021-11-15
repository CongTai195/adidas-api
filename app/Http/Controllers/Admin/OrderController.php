<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(): JsonResponse
    {
        return ResponseHelper::send($this->orderService->all());
    }

    public function getDetail($id): JsonResponse
    {
        return ResponseHelper::send($this->orderService->findByField('transaction_id', $id));
    }
}
