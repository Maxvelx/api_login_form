<?php

namespace App\Service\User;

use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store($data)
    {

        $users = json_decode(file_get_contents(storage_path('/app/users/users.txt')), true);
        $log = json_decode(file_get_contents(storage_path('logs/test.log')), true);;

        try {
            $data['password'] = Hash::make($data['password']);
            if (isset($users)) {
                foreach ($users as $user) {
                    if ($user['email'] === $data['email']) {
                        $data['error'] = 'Користувач з таким email вже є в базі';
                        $data['time'] = date('d-m-Y H:i:s');
                        $log[]         = $data;
                        file_put_contents(storage_path('logs/test.log'), json_encode($log));

                        return response()->json(['message' => 'Користувач з таким email вже є в базі'], 422);
                    }
                }
            }

            $users[] = $data;
            file_put_contents(storage_path('app/users/users.txt'), json_encode($users));

            return response(status: 201);

        } catch (\Exception $e) {
            return $e;
        }

    }
}
