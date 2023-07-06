<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'bail|required|max:100|min:8',
            'password'=>'bail|required|max:255|min:8',
            'email'=>'bail|required|max:255|min:8|emai|unique:user,emai',
            'phone'=>'bail|required|numeric',
            
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Account name cannot be empty',
            'name.min' => 'Account name must be at least 8 characters',
            'name.max' => 'Account name cannot exceed 100 characters',
            'password.required' => 'Account password cannot be empty',
            'email.required' => 'Account email cannot be empty',
            'phone.required' => 'Account phone cannot be empty',

        ];
    }
}
