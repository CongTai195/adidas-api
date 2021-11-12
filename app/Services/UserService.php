<?php

namespace App\Services;

use App\Repositories\CartRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;
    protected $transactionRepository;
    protected $cartRepository;

    public function __construct(
        UserRepository $userRepository,
        TransactionRepository $transactionRepository,
        CartRepository $cartRepository
    ) {
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
        $this->cartRepository = $cartRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function get($id, $column = ['*'])
    {
        return $this->userRepository->find($id, $column);
    }

    public function getDeletedUsers()
    {
        return $this->userRepository->onlyTrashed()->get();
    }

    public function updateDeletedUsers(array $ids)
    {
        return $this->userRepository->withTrashed()->whereIn('id', $ids)->restore();
    }

    public function deleteUsers(array $ids)
    {
        return $this->userRepository->whereIn('id', $ids)->delete();
    }

    public function update($data, $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function delete($id): int
    {
        $this->deleteForeignKey($id);
        return $this->userRepository->delete($id);
    }

    private function deleteForeignKey($id) {
        $this->transactionRepository->deleteByUser($id);
        $this->cartRepository->deleteByUser($id);
    }

    public function create(array $attributes)
    {
        return $this->userRepository->create($attributes);
    }
}
