<?php

namespace App\Services;

use App\Repositories\DetailProductRepository;

class DetailProductService
{
    protected $detailProductRepository;

    public function __construct(DetailProductRepository $detailProductRepository)
    {
        $this->detailProductRepository = $detailProductRepository;
    }

    public function all() {
        return $this->detailProductRepository->all();
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->detailProductRepository->findByField($field, $value, $columns);
    }
}
