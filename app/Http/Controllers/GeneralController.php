<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use App\Models\Translator;
use App\Models\User;
use App\WebTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class GeneralController extends Controller
{

    public function sendPwdLink()
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            request()->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
    }

    public  function forgetPsswordWindow()
    {
        if(!$message = session('message'))
            $message = '';

        return view('auth.forgot-password-window')->with([
            'message' => $message,
            'title' => 'Forget Password'
        ]);
    }

    public  function sendResetLink()
    {
        $token = Str::random(64);
        $user = User::where('email', request()->email)->first() ?? null;
        if($user){
            \DB::table('password_reset_tokens')->updateOrInsert([
                'email' => request()->email,
            ], [
                'token' => $token,
                'created_at' => \Carbon\Carbon::now(),
            ]);
            $reset_link = env('APP_URL') . '/reset-password-link/' . $token . '?email=' . request()->email;
            \Mail::to($user->email)->send(new PasswordResetMail($user, $reset_link));
            return redirect()->back()->with('status', 'Password Rest Link has been sent successfully');
        }else{
            return redirect()->back()->with('status', 'Error in Email please check your Email Address');
        }
    }


    public  function emailSending()
    {
        return $this->sendResetLink();
        // $status = Password::sendResetLink(
        //     request()->only('email')
        // );
        // return $status === Password::RESET_LINK_SENT
        // ? back()->with('status', __($status))
        // : back()->withErrors(['email' => __($status)]);
    }

    public  function resetPassword()
    {
        $record = \DB::table('password_reset_tokens')
        ->where('email', request()->email)
        ->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Invalid password reset request.']);
        }

        // Token expiry check (60 minutes)
        if (\Carbon\Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['email' => 'Reset token has expired.']);
        }

        if (!Hash::check(request()->token, $record->token)) {
            return back()->withErrors(['token' => 'Invalid reset token.']);
        }

        User::where('email', request()->email)->update([
            'password' => Hash::make(request()->password)
        ]);

        DB::table('password_reset_tokens')->where('email', request()->email)->delete();

        return redirect('/login')->with('status', 'Password reset successful.');
    }

    public static function generalFn()
    {
        echo 'General Function';
    }

    public function generalTransalte($flag = 'root'){
        $maps = request()->k;
        $results = [];
        foreach($maps as $map){
            $results[$map] = Translator::where($flag, $map)->first()->tranlated ?? $map;
        }
        return response()->json($results);
    }

    public function activateAccount($user_account){

        $user = User::find(WebTool::decode($user_account)) ?? null;
        
        if($user){
            $flag = $user->status;
            $update = $user->update([
                'status' => 'active',
            ]);

            if($flag == 'active' || $update){
                Auth::login($user);
                return redirect('/dashboard');
            }
        }
    }

    public function index(){
        if(!$message = session('message'))
            $message = '';
        
        return view('welcome')->with([
            'message' => $message,
            'title' => 'Welcome window',
        ]);
    }
}
