<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index(){
        return view("signin.index", [
            "title" => "Sign in"
        ]);
    }

    public function authenticate(Request $request){
        $data = $request->validate([
            "email" => "required|email:dns",
            "password" => ["required", "min:7", "max:77"]
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->intended("/dashboard");
        }

        return back()->with("signinError", "Sign in error. Masukkan email dan password dengan benar.");
    }

    public function signout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/signin');
    }
}