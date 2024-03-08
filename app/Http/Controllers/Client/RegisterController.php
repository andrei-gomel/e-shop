<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @param UserStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if($user)
        {
            event(new Registered($user));

            Auth::login($user);
            //session(['user_id' => Auth::user()->id]);

            //return redirect(route('client-cabinet'));
            return redirect(route('verification.notice'));
        }

        return redirect(route('client_reg'))->withErrors([
            'regError' => 'Произошла ошибка при регистрации пользователя'
        ]);
    }
}
