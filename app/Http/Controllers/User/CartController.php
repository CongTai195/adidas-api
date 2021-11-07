<?php

namespace App\Http\Controllers\User;

use App\Helpers\ResponseHelper;
use App\Http\Request\CreateCartRequest;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;

class CartController
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(): JsonResponse
    {
        return ResponseHelper::send($this->cartService->findByField('user_id', auth('api')->user()['id']));
    }

    public function create(CreateCartRequest $request): JsonResponse
    {
        return ResponseHelper::send($this->cartService->updateOrCreate(
            [
                'user_id' => $request['user_id'],
                'product_id' => $request['product_id']
            ],
            $request->all()));
    }
}
