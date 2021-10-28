<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController
{
    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $data = $this->categoryService->all()->toArray();
        $categories = array_filter(
            $data,
            function ($var) {
                return is_null($var['type']);
            }
        );
        foreach($categories as $key => $category) {
            $subs = array_filter(
                $data,
                function ($var) use ($category) {
                    return $var['type'] == $category['id'];
                }
            );
            $categories[$key]['subs'] = $subs;
        }
        return ResponseHelper::send($categories);
    }
}
