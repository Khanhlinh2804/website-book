<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'name'=>'required|max:50|min:3',
            'image' =>'required',
            'link' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name classify not empty',
            'name.max' => 'Name classify cannot be longer than 50 characters',
            'name.min' => 'Name classify cannot be short than 3 characters',
            'image.required' => 'Image not empty',
            'link' => 'link not empty'  
        ];
    }
}
