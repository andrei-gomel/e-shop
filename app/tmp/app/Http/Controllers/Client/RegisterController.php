<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        //dd($data);

        $data['password'] = Hash::make($data['password']);

        if(Auth::check())
        {
            return redirect(route('client-cabinet'));
        }

      /*  $data = $request->validate([
            'name' => 'required',
            'country_id' => 'required|int',
            'lang' => 'required|int',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
            'phone' => 'required',
            'city' => 'required',
            'type' => 'required'
        ]);*/

        //dd($data);

        if(User::where('email', $data['email'])->exists())
        {
            redirect(route('client_reg'))->withErrors([
                'email' => 'Такой Email уже зарегистрирован!'
            ]);
        }

        //dd($data);

        $user = User::create($data);

        if($user)
        {
            Auth::login($user);
            //session(['user_id' => Auth::user()->id]);
            return redirect(route('client-cabinet'));
        }

        return redirect(route('client_reg'))->withErrors([
            'regError' => 'Произошла ошибка при регистрации пользователя'
        ]);
    }
}
