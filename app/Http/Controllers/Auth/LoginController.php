<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan halaman login berada di resources/views/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // redirect ke dashboard jika login sukses
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Menangani logout pengguna
    public function logout(Request $request)
    {
        Auth::logout(); // logout pengguna
        $request->session()->invalidate(); // menghapus sesi
        $request->session()->regenerateToken(); // regenerasi CSRF token

        return redirect('/login'); // redirect ke halaman utama
    }
}
