<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        auth("web")->logout();
        return redirect(route('home'));
    }

    public function showRegForm()
    {
        return view('auth.registration');
    }

    public function registration(Request $request)
    {
        $valid = $request->validate([
            "name" => "required|min:5|max:100",
            "email" => "required|email|string|unique:users,email",
            "password" => ["required", "confirmed"]
        ]);
//        $user = new User::create([
//            "name"=> $data["name"],
//            "email"=> $data['email'],
//            "pass" => bcrypt($data['pass'])
//        ]);
        $user = new User();
        $user->name = $valid["name"];
        $user->email = $valid['email'];
        $user->password = bcrypt($valid['password']);
        $user->save();
        if ($user) {
            auth("web")->login($user);
        }
        return redirect(route('home'));
    }

    public function login(Request $request)
    {
        $valid = $request->validate([
            "email" => "required|email|string",
            "password" => ["required"]
        ]);
        if (auth("web")->attempt($valid)) {
            return redirect(route('home'));
        }
        return redirect(route('login'))->withErrors(["email"=>'Пользователь не найден (']);

    }
}
