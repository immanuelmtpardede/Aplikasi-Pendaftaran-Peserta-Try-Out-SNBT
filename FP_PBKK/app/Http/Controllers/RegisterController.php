<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("register.index", [
            "title" => "Registrasi"
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            "name" => "required|max:77",
            "username" => "required|max:77|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => ["required", "min:7", "max:77"]
        ]);

        $data["password"] = Hash::make($data["password"]);

        User::create($data);

        return redirect("/signin")->with("success", "Registrasi berhasil.");
    }
}