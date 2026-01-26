<?php

use App\Http\Controllers\PipController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\PipPortalController;

Route::middleware('auth')->group(function () {
    Route::get('/', [PipController::class, 'index']);
    Route::get('/dashboard', [PipController::class, 'index'])->name('dashboard');
    Route::get('/profile/application/fill', [PipController::class, 'formFilling']);
    Route::get('/profile/application/fill/{page}', [PipController::class, 'formWithPage']);
    Route::get('/pip/profile/create-wishlist', [WishListController::class, 'createWishListWindow']);

    Route::get('/pip/download/files/{file}/{name}', [PipController::class, 'downloadFile']);



    Route::post('/pip/post/logo', [PipController::class, 'postLogo']);
    Route::post('/pip/local/complete/registration', [PipController::class, 'completeLocalReg']);
    Route::post('/pip/local/icp/reception/post', [PipPortalController::class, 'icpRecp']);
    Route::post('/pip/icp/remove/contract', [PipPortalController::class, 'removeContract']);
    Route::post('/pip/local/icp/provider/post', [PipPortalController::class, 'icpPost']);
    Route::post('/pip/local/update/contact-officer', [PipPortalController::class, 'updateOfficer']);
    Route::post('/pip/local/remove/bord-directors', [PipPortalController::class, 'removeDirs']);
    Route::post('/pip/local/post/bord-directors', [PipPortalController::class, 'postDirectors']);
    Route::post('/application/fill/{type}/{page}', [PipController::class, 'updateApplication']);

});
