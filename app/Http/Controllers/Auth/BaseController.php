<?php

namespace App\Http\Controllers\Auth;


use App\Service\User\UserService;

class BaseController extends UserService
{

    public UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
