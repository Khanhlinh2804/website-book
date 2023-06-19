<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            "name"=> "required|min:4|max:100",
            "price" => "required|numeric|gte:1",
            "sale_price" => "numeric|gte:0|lte:price",
            "image" => "required|mimes:png,ipg,jpeg,webp,jfif"
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Product name cannot be empty',
            'name.min'=>'Product name cannot be shorter than 5 characters and longer than 100 characters',
            'name.max'=>'Product name cannot be shorter than 5 characters and longer than 100 characters',
            'price.required'=> 'The price cannot be left blank',
            'image.required'=> 'The image cannot be left blank',
            'image.mimes'=> 'The image is not in the correct format'
        ];
    }
}
