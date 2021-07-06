<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SchoolReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' =>'required',
            'content' =>'required'

        ];
    }


    public function messages(){

        return [

            'name.required' => 'Это поле обязательно к заполнению',
            'content.required' => 'Это поле обязательно к заполнению'
        ];
    }
}
