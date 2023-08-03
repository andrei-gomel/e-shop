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
        //$user = User::find($request->email);

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

        //dd($data);

        if(Auth::attempt($data))
        //if(Auth::login($user))
        {
            if(Auth::user()->name == 'admin')
            {
                return redirect()->intended(route('main-admin'));
            }
//dd(3333333333333333);
            //session(['user_id' => Auth::user()->id]);
            return redirect()->intended(route('shop-index'));
        }

        return redirect(route('client-login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
