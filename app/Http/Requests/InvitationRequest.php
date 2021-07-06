<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class InvitationRequest extends FormRequest
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

           'to' => ['required'],
           'subject' =>'required',
           'message' =>'required'
        ];
    }


    public function messages(){

         return [
             'to.required' =>'Требуется электронная почта получателя',
             'subject.required' =>'предмет обязателен',
             'message.required' =>'сообщение обязательно'
         ];
    }
}
