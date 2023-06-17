<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "category_store" =>"required|min:5|max:50"
        ];
    }
    // public function messages(){
    //     return [
    //         'category_store.required'=>'Category name cannot be empty';
    //         'category_store.min'=>'Category name cannot be shorter than 5 characters and longer than 50 characters';
    //         'category_store.max'=>'Category name cannot be shorter than 5 characters and longer than 50 characters';
    //     ];
    // }
}
