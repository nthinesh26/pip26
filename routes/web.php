<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;

Route::get('/hq-test', function(){
    return view('tester.t1');
});

Route::get('/h2-page', function(){
    return view('tester.h2');
});


Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::get('/metrics', function () {
    return 1;
})->middleware('metrics');

Route::get('/test-mail', function () {
    // try {
    //     \Mail::to('app@example.com')->send(new TestMail());
    // } catch (\Exception $e) {
    //     dd($e->getMessage());
    // }
});

include 'user.php';
include 'pip-portal.php'; // pip portal
include 'pip-main.php'; // general rout sets phase 0
include 'wishlist.php';

include 'translator.php'; // translation
include 'pip-manage.php'; // admin routs for mnage phase 1

include 'tester.php';

Route::get('/email', function () {
    return view('email.confirmation')->with([
        'user' => \App\Models\User::find(17)
    ]);
});


Route::get('/user/forget-password', [GeneralController::class, 'forgetPsswordWindow']);
Route::post('/app/forget-password', [GeneralController::class, 'resetPassword']);

Route::get('/general', [GeneralController::class, 'generalFn']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\Auth\ManualPasswordResetController;

Route::get('/forgot-password', [ManualPasswordResetController::class, 'showForgotForm']);
Route::post('/pip/forgot-password', [ManualPasswordResetController::class, 'sendResetLink']);

Route::get('/pip/reset-password/{token}', [ManualPasswordResetController::class, 'showResetForm']);
Route::post('/pip/reset-password', [ManualPasswordResetController::class, 'resetPassword']); //sendResetLink

require __DIR__ . '/auth.php';
