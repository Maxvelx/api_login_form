<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UserStoreRequest;

class RegisterController extends BaseController
{


    public function __invoke(UserStoreRequest $request)
    {
        $data = $request->validated();

        return $this->service->store($data);
    }
}
