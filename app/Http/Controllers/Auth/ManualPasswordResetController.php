<?php

namespace App\Http\Controllers\Auth;

use App\WebTool;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ManualPasswordResetController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);


        $plainToken = Str::random(64);
        \DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($plainToken),
                'created_at' => Carbon::now()
            ]
        );

        $resetLink = url('/pip/reset-password/' . $plainToken . '?email=' . $request->email);
        $user = User::where('email', $request->email)->first() ?? null;
        Mail::to($request->email)->send(new PasswordResetMail($user, $resetLink));

        return back()->with('status', 'Password reset link sent successfully.');
    }

    public function showResetForm(Request $request, string $token)
    {
        return view('auth.password-reset-form', [
            'token' => $token,
            'email' => $request->email,

        ]);
    }



    public function resetPassword(Request $request)
    {
        $email = WebTool::dec($request->email);
        $token = WebTool::dec($request->flag);
        // $flag = WebTool::dec($request->flag);

        $record = DB::table('password_resets')
            ->where('email', $email)
            ->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Invalid reset request']);
        }

        if (!Hash::check($token, $record->token)) {
            return back()->withErrors(['token' => 'Invalid or expired token']);
        }


        if (\Carbon\Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['token' => 'Token expired']);
        }

        User::where('email', $email)->update([
            'password' => Hash::make($request->password)
        ]);

        \DB::table('password_resets')->where('email', $email)->delete();
        return redirect('/login')->with('status', 'Password reset successful.');
    }
}
