<?php

namespace App\Http\Controllers\User;

use App\Helpers\ResponseHelper;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;

class CartController
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index($id): JsonResponse
    {
        return ResponseHelper::send($this->cartService->findByField('user_id', $id));
    }
}
