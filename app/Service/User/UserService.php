<?php

namespace App\Service\User;

use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store($data)
    {

        $arr = json_decode(file_get_contents(storage_path('/app/users/users.txt')), true);
        $log = json_decode(file_get_contents(storage_path('logs/test.log')), true);;

        try {
            $data['password'] = Hash::make($data['password']);
            if (isset($arr)) {
                foreach ($arr as $item) {
                    if ($item['email'] === $data['email']) {
                        $data['error'] = 'Користувач з таким email вже є в базі';
                        $data['time'] = date('d-m-Y H:i:s');
                        $log[]         = $data;
                        file_put_contents(storage_path('logs/test.log'), json_encode($log));

                        return response()->json(['message' => 'Користувач з таким email вже є в базі'], 422);
                    }
                }
            }

            $arr[] = $data;
            file_put_contents(storage_path('app/users/users.txt'), json_encode($arr));

            return response(status: 201);

        } catch (\Exception $e) {
            return $e;
        }

    }
}
