<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->with(['detailProducts'])->all();
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->productRepository->findByField($field, $value, $columns);
    }
}
