<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::check())
        {
            if(Auth::user()->name == 'admin')
            {
                return redirect()->intended(route('main-admin'));
            }
            //session(['user_id' => Auth::user()->id]);
            return redirect()->intended(route('client-cabinet'));
        }
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data))
        {
            if(Auth::user()->name == 'admin')
            {
                return redirect()->intended(route('main-admin'));
            }
            //session(['user_id' => Auth::user()->id]);
            return redirect()->intended(route('client-cabinet'));
        }

        return redirect(route('client-login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);

        /**
         *
         *  Вход реализованный только для админа (версия на 25.01.2023)
         */
        /*
        if(Auth::check())
        {
            return redirect()->intended(route('main-admin'));
        }
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data))
        {
            return redirect()->intended(route('main-admin'));
        }

        return redirect(route('admin.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);*/
    }
}
