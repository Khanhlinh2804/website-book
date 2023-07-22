<?php

namespace App\Http\Requests\author;

use Illuminate\Foundation\Http\FormRequest;

class AuthorValidate extends FormRequest
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
            // "category_store" =>"required|min:5|max:50"
        ];
    }
    public function messages(){
        return [
            // 'category_store.required'=>'Category name cannot be empty',
            // 'category_store.min' => 'Category name must be at least 5 characters',
            // 'category_store.max' => 'Category name cannot exceed 50 characters'
        ];
    }
}
