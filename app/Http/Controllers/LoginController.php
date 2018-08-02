<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Student;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required| max:255',
            'password' => 'required| max:255'
        ]);

        $user = User::where('login', '=', $request->login)->first();
        if($user == NULL) return redirect('/')->withErrors(['Invalid data!']);
        if(Hash::check($request->password, $user->password))
        {
            return redirect('/students');
        }
        else return redirect('/')->withErrors(['Invalid data!']);
    }
}
