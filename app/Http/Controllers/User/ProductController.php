<?php

namespace App\Http\Controllers\User;

use App\Helpers\ResponseHelper;
use App\Services\DetailProductService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController
{
    protected $productService;
    protected $detailProductService;

    public function __construct(
        ProductService $productService,
        DetailProductService $detailProductService
    ) {
        $this->productService = $productService;
        $this->detailProductService = $detailProductService;
    }

    public function index():JsonResponse
    {
        return ResponseHelper::send($this->productService->all());
    }

    public function getDetailProduct($id): JsonResponse
    {
        return ResponseHelper::send($this->productService->findByField('id', $id));
    }
}
