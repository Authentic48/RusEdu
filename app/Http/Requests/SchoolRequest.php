<?php

namespace App\Http\Requests;
use Auth;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'email' => ['required',],
            'user_id' => 'required',
            'location' => 'required',
            'subject' => 'required',
            'experience' => 'required',
            'phone' => 'required',
            'pic' => 'required | mimes:jpeg,png,jpg | max:2048',
            'price' => 'required',
            'about' => 'required',
            'work_day' => 'required',
            'from' => 'required',
            'to' => 'required',
            'address' => 'required',
            'onlineTraining' => 'required',
            'website' => 'required_with:website, reactive_url',
            'skype' => 'required_with:skype, reactive_url',
            'vk' => 'required_with:vk active_url',
            'instagram' => 'required_with:instagram,active_url',
        ];
    }


     public function messages()
     {
     return [

     'email.required' => 'Требуется электронная почта!',
     'name.required' => 'имя обязательно!',
     'location.required' => 'город обязательно!',
     'subject.required' => 'Профессиональное званиеобязательно!',
     'experience.required' => 'Опыт обязательно!',
     'phone.required' => 'Телефон обязательно!',
     'pic.required' => 'Фото обязательно!',
     'wages.required' => 'Заработная плата обязательно!',
     'about.required' => 'о школе обязательно!',
     'user_id.required' => 'обязательно!',

     ];
     }
}
