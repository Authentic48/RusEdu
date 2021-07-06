<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class ApplicationRequest extends FormRequest
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
            'email' => ['required',],
            'user_id' => 'required',
            'teacher_id' => 'required',
            'job_id' => 'required',
            'name' => 'required',
            'resume' => 'required |mimes:pdf|max:100000',
            'status' => 'required',
            'job_title' => 'required',
            'school_name' => 'required',
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
             'resume.required' => 'резюме обязательно',
             'job_title.required' => 'Место работы обязательно',
             'school_name.required' => 'Место работы обязательно',
      ];
    }

}
