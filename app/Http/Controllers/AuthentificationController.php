<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthentificationController extends Controller
{
    public function getRogister()
    {
        return view('aut.sign-up');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ], [
            'email.unique' => 'The email address is already registered.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        $isEmailExist = User::where('email', $request->email)->first();

        if ($isEmailExist) {
            return back()->withErrors(['email' => 'The email address is already registered.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 17,
        ]);

        return redirect()->route('auth_getLogin');
    }
    public function getLogin()
    {
        return view('aut.sign-in');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
        session(['id' => $user->id]);

        return redirect()->route('acceuille');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('auth_getLogin');
    }
}
