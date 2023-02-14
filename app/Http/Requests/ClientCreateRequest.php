<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => 'required|min:3|max:50',
            'email'        => 'required|min:5|max:50',
            'phone'        => 'required|min:5|max:18',
            'city'        => 'required|min:4|max:50',
            'country_id'   => 'required|integer|exists:country,id',
            'role' => 'required|integer|between:1,2',
            //'password' => 'confirmed|min:6|max:12',
        ];
    }
}
