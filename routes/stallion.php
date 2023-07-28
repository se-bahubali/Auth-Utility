<?php

use Illuminate\Support\Facades\Route;
use StallionExpress\AuthUtility\Controllers\StallionAuthController;
use StallionExpress\AuthUtility\Controllers\StallionLogoutController;

Route::middleware(['decode_st'])->group(function () {
    Route::get('/auth/callback', [StallionAuthController::class, 'getAccessToken']);

    Route::get('/login', [StallionAuthController::class, 'login'])->name('authLogin');

    Route::get('api/stallion/access/token/{id}', [StallionAuthController::class, 'returnToken']);      

    Route::get('api/stallion/{role}/scopes', [StallionAuthController::class, 'userScopes'])->name('returnScopes');

    Route::get('api/logout', [StallionLogoutController::class, 'logout'])->name('logout');
});
