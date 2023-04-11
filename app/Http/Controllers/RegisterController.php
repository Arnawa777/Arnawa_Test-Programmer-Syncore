<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns|max:255|unique:users',
            'password' => 'required|min:6|max:50'
        ]);

        $user = User::create([
        'email' => $validateData['email'],
        'password' => Hash::make($validateData['password']),
    ]);

        // $user->nama = 'user' . ' (' . $user->id . ')';
        // $user->slug = SlugService::createSlug(User::class, 'slug', $request->nama);


        $user->save();
        return redirect('/login')->with('success', 'Registration sucessfully! Please Login');
    }
}
