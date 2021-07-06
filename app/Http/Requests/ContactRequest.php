<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
             'name' =>'required',
             'email' =>'required',
             'message' =>'required',
        ];
    }

 /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'name.required' => 'имя обязательно',
        'email.required' => 'Эл. адрес обязательно',
        'message.required' => 'сообщение обязательно',
    ];
}

}
