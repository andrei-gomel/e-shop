<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);

        if (empty($user)) {
            $notification = [
                'message' => 'Запись id='. Auth::user()->id .' не найдена',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        // Получаем страну пользователя
        $country = $user->country;

        //$user->country = $country->name;

        $countries = Country::all();

        if (empty($user)) {
            abort(404);
        }

        return view('client.setting', compact('user', 'countries'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find(intval($id));

        $data = $request->all();

        if ($data['password'] !== null) {
            $pass = $data['password'];
            $data['password'] = Hash::make($pass);
        } else {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        $user_email = User::where('email', $data['email'])
                            ->where('id', Auth::user()->id)
                            ->first();

        if($user_email)
        {
            $result = $user->update($data);

            if ($result)
            {
                $notification = [
                    'message' => 'Изменения сохранены',
                    'alert-type' => 'success',
                ];

                return redirect()
                    ->route('client-setting')
                    ->with($notification);
            }
            else
            {
                $notification = [
                    'message' => 'Ошибка сохранения',
                    'alert-type' => 'error',
                ];

                return redirect()
                    ->route('client-setting')
                    ->with($notification);
            }
        }
        else
        {
            $notification = [
                'message' => 'Такой email уже существует!',
                'alert-type' => 'error',
            ];

            return redirect()
                ->route('client-setting')
                ->with($notification);
        }
    }
}
