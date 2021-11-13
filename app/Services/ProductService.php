<?php

namespace App\Services;

use App\Repositories\DetailProductRepository;
use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;
    protected $detailProductRepository;

    public function __construct(
        ProductRepository $productRepository,
        DetailProductRepository $detailProductRepository
    ){
        $this->productRepository = $productRepository;
        $this->detailProductRepository = $detailProductRepository;
    }

    public function all()
    {
        return $this->productRepository->with(['detailProducts'])->all();
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->productRepository->with(['detailProducts'])->findByField($field, $value, $columns);
    }

    public function create(array $attributes)
    {
        return $this->productRepository->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->productRepository->update($attributes, $id);
    }

    public function delete(array $ids)
    {
        return $this->userRepository->whereIn('id', $ids)->delete();
    }
}
