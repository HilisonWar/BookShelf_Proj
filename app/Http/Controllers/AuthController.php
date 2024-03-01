<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
        public function Login(Request $request)
        {

            if(!Auth::attempt($request->only('email','password')))
                echo "Неверный логин или пароль";

            else return redirect()-> route("mainPage");
        }

        public function Register(Request $request)
        {
           
            $user = User::create([
                'email'    => $request->input('email'),
                'name'     => $request->input('name'),
                'password' => bcrypt($request->input('password'))
            ]);

            Auth::login($user);

            return redirect() ->route("mainPage")->with("success","Вы успешно зарегистрированы");
        
        }

        public function Logout()
        {
            Auth::logout();
            return redirect()->route("login");
        }
}
