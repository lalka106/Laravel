<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name'=>['min:5','max:15','string'],
            'email'=>['required','email'],
            'subject'=>['required','min:5','max:20','string'],
            'message'=>['required','min:10','max:200','string']
        ];
    }
}
