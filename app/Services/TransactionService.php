<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function all()
    {
        return $this->transactionRepository->with(['orders'])->all();
    }

    public function findByField($field, $value, $with = [], $columns = ['*'])
    {
        if (count($with) == 0) {
            return $this->transactionRepository->findByField($field, $value, $columns);
        }
        return $this->transactionRepository->with($with)->findByField($field, $value, $columns);
    }
}
