<?php

namespace App\Http\Controllers\Client;

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
            session(['user_id' => Auth::user()->id]);
            return redirect()->intended(route('client-cabinet'));
        }
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data))
        {
            if(Auth::user()->name == 'admin')
            {
                return redirect()->intended(route('main-admin'));
            }
            session(['user_id' => Auth::user()->id]);
            return redirect()->intended(route('client-cabinet'));
        }

        return redirect(route('client-login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
