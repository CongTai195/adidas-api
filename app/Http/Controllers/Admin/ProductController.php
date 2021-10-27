<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request): JsonResponse
    {
        $data = $this->productService->all();
        $result['total'] = count($data);
        if (isset($request['page'])) {
            $result['products'] = $data->forPage(1, 10);
        }
        return ResponseHelper::send($result);
    }
}
