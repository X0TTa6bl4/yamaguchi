<?php

declare(strict_types=1);

use App\Http\Controllers\Api\AuthController as AuthControllerAlias;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->middleware('api')
    ->controller(AuthControllerAlias::class)
    ->group(function () {
        Route::post('login', 'login');
        Route::get('user', 'user');
        Route::post('logout', 'logout');
    });
