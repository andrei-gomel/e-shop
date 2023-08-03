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
        $id = Auth::user()->id;

        $user = User::find($id);

        if (empty($user)) {
            $notification = [
                'message' => 'Запись id='.$id.' не найдена',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        // Получаем страну пользователя
        $country = User::find($id)->country;

        //$user->country = $country->name;

        //dd($user);

        $countries = Country::all();

        if (empty($user)) {
            abort(404);
        }

        return view('client.setting', compact('user', 'countries'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $data = $request->all();

        //dd($data);

        $pass = $data['password'];

        $data['password'] = Hash::make($pass);

        $result = $user->update($data);

        if ($result) {
            $notification = [
                'message' => 'Изменения сохранены',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('client-setting')
                ->with($notification);
        } else {
            $notification = [
                'message' => 'Ошибка сохранения',
                'alert-type' => 'error',
            ];
        }
    }
}
