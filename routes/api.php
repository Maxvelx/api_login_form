<?php

use Illuminate\Support\Facades\Route;


Route::post('auth/reg', \App\Http\Controllers\Auth\RegisterController::class);
Route::get('service/log', \App\Http\Controllers\Service\LogController::class);
