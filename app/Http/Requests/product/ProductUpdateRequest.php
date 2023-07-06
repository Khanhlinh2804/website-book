<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            "name"=> "bail|required|min:4|max:100",
            "price" => "bail|required|numeric|gte:1",
            "sale_price" => "bail|numeric|gte:0|lte:price",
            "image" => "bail|mimes:png,ipg,jpeg,webp,jfif",
            "quantity" =>"bail|required|numeric|gte:1"
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Product name cannot be empty',
            'name.min' => 'Category name must be at least 5 characters',
            'name.max' => 'Category name cannot exceed 50 characters',
            'price.required'=> 'The price cannot be empty',
            'image.mimes'=> 'The image is not in the correct format',
            'quantity.required' => 'Product quantity cannot be empty',
            'quantuty.numeric' => 'Quantity must be entered as a number'
        ];
    }
}
