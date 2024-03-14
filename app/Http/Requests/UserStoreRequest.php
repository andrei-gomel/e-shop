<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/',
            'country_id' => 'required|integer',
            'city' => 'required|string|min:4|max:25',
            'email' => 'required|email|unique:users,email',
            //  Раскомментировать на боевом сервере:
            //'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'required|string|min:16|max:18',
            'password' => 'required|confirmed|min:6|max:12',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле Имя обязательное',
            'name.regex' => 'Поле Имя не может начинаться с цифр и не должно состоять только из цифр',
            'country_id.required' => 'Поле Страна обязательное',
            'city.required' => 'Поле Город обязательное',
            'email.required' => 'Поле E-mail обязательное',
            'email.email' => 'E-mail должен соответствовать формату email',
            'email.unique' => 'Такой E-mail уже существует',
            'phone.required' => 'Поле Телефон обязательное',
            'password.required' => 'Поле Пароль обязательное',
            'password.min' => 'Поле Пароль должно быть более 5 символов',
            'password.max' => 'Поле Пароль должно быть не менее 12 символов',
            'password.confirmed' => 'Поле Повтор пароля должно совпадать с полем Пароль',
        ];
    }

}
