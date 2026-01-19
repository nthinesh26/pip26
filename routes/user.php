<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;

Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('/', [GeneralController::class, 'index']);
    Route::get('/dashboard', [GeneralController::class, 'index'])->name('dashbaord');
    Route::get('/user/management', [UserController::class, 'index']);

    Route::post('/permission/fetch-in-box', [UserController::class, 'fetchSelectBox']);
    Route::post('/permission/fetch', [UserController::class, 'fetchPermission']);
    Route::post('/permission/sync', [UserController::class, 'permissionSync']);
    Route::post('/add/permission', [UserController::class, 'addPermission']);
    Route::post('/user/role/add', [UserController::class, 'addRole']);
});