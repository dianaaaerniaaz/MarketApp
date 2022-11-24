<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage(){
        if(Auth::check()){
            return redirect()->intended('/');
        }
        return view('auth.login');
    }
    public function login(Request $request){
        $validated = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (Auth::attempt($validated)){
            if(Auth::user()->role->name == "admin")
                return redirect()->intended('/adm/users');

            elseif(Auth::user()->role->name == "moderator")
                return redirect()->intended('/adm/categories');

            return redirect()->intended('/clothes');
        }
        return redirect()->back()->withErrors('Incorrect email or password');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }

}


