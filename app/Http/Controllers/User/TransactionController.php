<?php

namespace App\Http\Controllers\User;

use App\Helpers\ResponseHelper;
use App\Services\OrderService;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;

class TransactionController
{
    protected $transactionService;
    protected $orderService;

    public function __construct(
        TransactionService $transactionService,
        OrderService $orderService
    ) {
        $this->transactionService = $transactionService;
        $this->orderService = $orderService;
    }

    public function index($id): JsonResponse
    {
        return ResponseHelper::send($this->transactionService->findByField('user_id', $id, ['orders']));
    }
}
