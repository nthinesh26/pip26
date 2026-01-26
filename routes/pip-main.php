<?php
// public Registration window :: Get and Post

use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Institute\InstituteController;
use App\Http\Controllers\OEM\OEMController;
use App\Http\Controllers\PipController;
use App\Http\Controllers\Royal\RoyalController;

Route::get('/pip/registration/local-company', [PipController::class, 'regLocalCom']);
Route::get('/pip/account/active/{user_account}', [GeneralController::class, 'activateAccount']);
Route::get('/pip/registration/oem', [OEMController::class, 'index']);
Route::get('/pip/registration/royal', [RoyalController::class, 'index']);
Route::get('/pip/registration/institute', [InstituteController::class, 'index']);


Route::get('/pip/directory', [DirectoryController::class, 'index'])->name('directory');
Route::get('/pip/directory/list/{type}', [DirectoryController::class, 'filterByCtg']);

Route::post('/pip/dict/sorting', [DirectoryController::class, 'dictSorting']);

Route::post('/pip/registration/ins-registration', [InstituteController::class, 'postInstitute']);
Route::post('/pip/registration/royal-registration', [RoyalController::class, 'postRoyalGeneral']);
Route::post('/pip/general/registration', [PipController::class, 'submitLocalComDetails']);
Route::post('/pip/general/oem-registration', [OEMController::class, 'submitOEM']);


Route::post('/pip/general/translator', [GeneralController::class, 'generalTransalte']);
