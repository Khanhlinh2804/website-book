<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassilyRequest extends FormRequest
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
            'name'=>'bail|required|max:50|min:3'
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Classify name cannot empty',
            'name.min' => 'Category name must be at least 3 characters',
            'name.max' => 'Category name cannot exceed 50 characters'
        ]
    }
}
