<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use TeacherProfile;

class TeacherProfileRequest extends FormRequest
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
        $rules = [
            'name' => 'required | max:50',
            'email' => ['required',],
            'user_id' => 'required',
            'location' => 'required',
            'subject' => 'required',
            'experience' => 'required',
            'phone' => 'required',
            'pic' => 'required | mimes:jpeg,png,jpg | max:2048',
            'wages' => 'required',
            'about' => 'required',
            'citizenship' => 'required',
            'onlineTraining' => 'required',
            'skype' => 'required_with:skype, reactive_url',
            'vk' => 'required_with:vk active_url',
            'instagram' => 'required_with:instagram,active_url',
            'work_day' => 'required',
            'from' => 'required',
            'to' => 'required',
        ];
        return $rules;
    }
    
    public function messages()
    {
    return [
    
    'email.required' => 'Требуется электронная почта!',
    'name.required' => 'имя обязательно!',
    'location.required' => 'город обязательно!',
    'subject.required' => 'Профессиональное обязательно!',
    'experience.required' => 'Опыт обязательно!',
    'phone.required' => 'Телефон обязательно!',
    'pic.required' => 'Фото обязательно!',
    'wages.required' => 'Заработная плата обязательно!',
    'about.required' => 'о тебе обязательно!',
    'user_id.required' => 'this section обязательно!',
    'work_day.required' => 'доступность обязательно!',
    'from.required' => 'доступность обязательно!',
    'to.required' => 'доступность обязательно!',
    
    ];
    }

}
