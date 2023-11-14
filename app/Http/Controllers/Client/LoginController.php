<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

            return redirect()->intended(route('client-cabinet'));
        }
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data))
        {
            if(Auth::user()->name == 'admin')
            {
                return redirect()->intended(route('main-admin'));
            }

            return redirect()->intended(route('shop-index'));
        }

        return redirect(route('client-login'))->withErrors([
            'errors' => 'Не удалось авторизоваться'
        ]);
    }
}
