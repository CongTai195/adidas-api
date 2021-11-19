<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    protected $commentService;

    public function __construct(CommentRepository $commentService)
    {
        $this->commentService = $commentService;
    }

    public function all()
    {
        return $this->commentService->all();
    }

    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->commentService->findByField($field, $value, $columns);
    }

    public function create(array $attributes)
    {
        return $this->commentService->create($attributes);
    }

//    public function update(array $attributes, $id)
//    {
//        return $this->commentService->update($attributes, $id);
//    }


}
