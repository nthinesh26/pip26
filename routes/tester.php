<?php

use App\Models\User;
use App\Models\Transer;
use App\Mail\ConfirmEmail;
use App\Models\Translator;
use App\Models\LocalCompany;

Route::get('/tester', function () {
    $local = LocalCompany::find(2);
    $exps = json_decode($local->exps);
    // dd($exps);
});

// Route::get('/gen/{id}', function($id){
//     // echo '<a href="https://app-myip.boustead.com.my/pip/account/active/'.WebTool::enc($id, 3).'" target="_blank">LNK</a>';
// });

Route::get('/send-email/{user}', function($user_id){
    $user = User::find($user_id) ?? null;
    $mail = \Mail::to($user->email)
                ->send(new ConfirmEmail($user->id));
    dd($mail);
});
