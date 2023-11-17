<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name'        => 'required|min:5|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'brand'       => 'required|min:5|max:50',
            'code'        => 'required|min:5|max:25',
            'price'       => 'required|integer',
            'new_price'   => 'integer|nullable',
            'color'       => 'required|min:3|max:25',
            'description' => 'required|string|min:10|max:255',
            'photo'       => 'image|mimes:jpg,png,jpeg,bmp|max:2048',
        ];
    }
}
