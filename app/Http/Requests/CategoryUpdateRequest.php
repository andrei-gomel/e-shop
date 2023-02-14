<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return auth()->check();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|min:4|max:50',
            'slug'        => 'max:50',
            //'description' => 'string|min:10|max:200',
            'parent_id'   => 'required|integer|exists:categories,id',
        ];
    }
}
