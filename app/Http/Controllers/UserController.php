<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{


    public function register()
    {
        return view('user.register');
    }
    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
            'password' => ['required'],
        ]);

        User::create($request->all());
        return redirect()->route('login');
    }

    public function login()
    {
        return view('user.login');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('welcome');
        }
        return 'Wrong email or password';
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
