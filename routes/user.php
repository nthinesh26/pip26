<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;

Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('/', [GeneralController::class, 'index']);
    Route::get('/dashboard', [GeneralController::class, 'index'])->name('dashbaord');
    Route::get('/user/management', [UserController::class, 'index']);
    Route::get('/pip/directory', [DirectoryController::class, 'index'])->name('directory');
    Route::get('/pip/directory/list/{type}', [DirectoryController::class, 'filterByCtg']);

    Route::post('/pip/dict/sorting', [DirectoryController::class, 'dictSorting']);
    Route::post('/permission/fetch-in-box', [UserController::class, 'fetchSelectBox']);
    Route::post('/permission/fetch', [UserController::class, 'fetchPermission']);
    Route::post('/permission/sync', [UserController::class, 'permissionSync']);
    Route::post('/add/permission', [UserController::class, 'addPermission']);
    Route::post('/user/role/add', [UserController::class, 'addRole']);

});
