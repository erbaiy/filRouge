<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;


class ForgetPassword extends Controller
{
    //
    public function forgetPassword()
    {

        return view('aut.forget-password');
    }
    public function sendToEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'the email does not existe.']);
        }
        $token = Str::random(60);

        User::where('email', $request->email)
            ->update(['remember_token' => $token]);

        $link = route('resetwithemail', ['token' => $token]);

        $success = Mail::raw('To reset your password, click on the following link: ' . $link, function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Reset Password');
        });
        // dd($resetLink);
        if ($success) {

            return back()->with('seccess', 'Password reset link sent.');
        } else {
            dd('failed');
            return back()->withErrors(['error' => 'Failed to send reset link.']);
        }
    }

    public function getThenewPassword($token)
    {
        return view('aut.newpassword', compact('token'));
    }
    public function addNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
        $user = User::where('remember_token', $request->token)->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();
        if ($user) {
            redirect(route('auth_getLogin'))->with('status', 'Your password has been changed successfully! Please login now');
        } else {
            dd(0);
        }
    }
}
