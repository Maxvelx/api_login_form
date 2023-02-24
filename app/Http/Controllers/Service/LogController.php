<?php

namespace App\Http\Controllers\Service;


class LogController
{
    public function __invoke()
    {
        $log = json_decode(file_get_contents(storage_path('logs/test.log')), true);

        return $log;
    }
}
