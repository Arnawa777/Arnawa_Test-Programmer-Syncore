<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirectBasedOnRole()
    {
        if(auth()->user()->role == 'admin') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('profile');
        }
    }

    public function loginForm()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // lakukan validasi login
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            // jika login berhasil, redirect ke halaman sesuai dengan rolenya
            return $this->redirectBasedOnRole();
            $request->session()->regenerate();
        } else {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
