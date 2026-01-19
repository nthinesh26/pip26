<?php

use Illuminate\Support\Str;

if(!function_exists('greetings')){
    function greetings(){
        return 'Hello from Scicom!';
    }
}

if(!function_exists('ownership')){
    function ownership($user_id){
        $auth = auth()->user()->id;
        if($user_id == 0)
            return true;
        
        $user = User::find($user_id) ?? null;
        if($user){
            if($auth == $user->id)
                return true;
        }
        return false;
    }
}