<?php

use App\Models\User;
use App\Models\Transer;
use App\Mail\ConfirmEmail;
use App\Models\Translator;
use App\Models\LocalCompany;

Route::get('/tester', function () {
    $local = LocalCompany::find(2);
    $exps = json_decode($local->exps);
    dd($exps);
});

Route::get('/send-email/{user}', function($user_id){
    $user = User::find($user_id) ?? null
    $mail = \Mail::to($user->email)
                ->send(new ConfirmEmail($user->id));
    dd($mail);
});
