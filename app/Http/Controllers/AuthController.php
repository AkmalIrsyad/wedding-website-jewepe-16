<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     public function showLogin()
    {
        return view('auth.login'); // tampilan login
    }

    public function login(Request $request)
    {
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ], [
        'username.required' => 'username wajib diisi.',
        'password.required' => 'Password wajib diisi.',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard'); // halaman setelah login
    }

    return back()->withErrors([
        'username' => 'username atau password salah.',
    ])->onlyInput('username');
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
