<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Services\UserService;
use \Illuminate\Http\JsonResponse;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        return ResponseHelper::send($this->userService->all());
    }
}
