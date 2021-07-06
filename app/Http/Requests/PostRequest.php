<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;


class PostRequest extends FormRequest
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
                'name' => 'required | max:50',
                'email' => 'required',
                'user_id' => 'required',
                'city' => 'required',
                'title' => 'required|max:100',
                'content' => 'required',
                
        ];
    }

    public function messages()
    {
    return [

    'email.required' => 'Требуется электронная почта!',
    'name.required' => 'имя обязательно!',
    'location.required' => 'город обязательно!',
    'title.required' => 'заглавие  обязательно!',
    'content.required' => 'содержание обязательно!',
    'user_id.required' => 'обязательно!',

    ];
    }
}
