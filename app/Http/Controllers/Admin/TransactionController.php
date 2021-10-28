<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;

class TransactionController
{
    protected $transactionService;
    protected $orderService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(): JsonResponse
    {
        return ResponseHelper::send($this->transactionService->all());
    }
}
