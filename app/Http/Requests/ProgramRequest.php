<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class ProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category' => 'required',
            'user_id' => 'required',
            'level' => 'required',
            'price' => 'required',
            'image' => 'required | mimes:jpeg,png,jpg | max:2048',
        ];
    }

     public function messages()
     {
     return [

     'name.required' => 'название программы обязательно!',
     'category.required' => 'категория обязательно!',
     'user_id.required' => 'город обязательно!',
     'level.required' => 'уровень обязательно!',
     'price.required' => 'цена обязательно!',
     'image.required' => 'Фото обязательно!',

     ];
     }
}
