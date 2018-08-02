<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users|min:6|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
        ]);
        
        return view('login');
    }
}
