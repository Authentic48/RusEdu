<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class JobRequest extends FormRequest
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
           'title' => 'required | max:50',
           'email' => ['required',],
           'user_id' => 'required',
           'city' => 'required',
           'profession' => 'required',
           'experience' => 'required',
           'salary' => 'required',
           'about' => 'required',
           'deadline' => 'required | date',
           'application' => 'required',
           'description' => 'required',
           'requirements' => 'required',
           'address' => 'required',
           'name' => 'required',
        ];
    }

    public function messages(){
        
        return [
            'email.required' => 'Требуется электронная почта!',
            'title.required' => 'заглавие обязательно!',
            'city.required' => 'Город обязателен!',
            'profession.required' => 'Профессия обязательна!',
            'experience.required' => 'Опыт работы обязателен!',
            'deadline.required' => 'Срок исполнения обязателен!',
            'description.required' => 'описание обязательно!',
            'requirements.required' => 'требования обязательно!',
            'about.required' => 'о школе обязательно!',
            'user_id.required' => 'this section обязательно!',
            'address.required' => 'адрес обязательно!',
            'salary.required' => 'зарплата обязательно!',
            'application.required' => 'применение обязательно!',
            'name.required' => 'Имя обязательно!'
        ];
    }
}
