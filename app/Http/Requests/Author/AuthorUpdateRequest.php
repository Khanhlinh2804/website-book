<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authorUpdate extends FormRequest
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
            "name"=>'required|unique:author,name|max:255|min:5' 
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Author name cannot be empty',
            'name.min'=>'Author name cannot be shorter than 5 characters and longer than 50 characters';
            'name.max'=>'author name cannot be shorter than 5 characters and longer than 50 characters';
        ]
    }

    
}
