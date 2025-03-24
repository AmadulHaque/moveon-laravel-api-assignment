<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:100',
            'image_url' => 'nullable|url|max:2048',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a valid string.',
            'name.max' => 'The product name must not exceed 255 characters.',

            'description.string' => 'The description must be a valid string.',

            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be at least 0.',

            'category.required' => 'The category is required.',
            'category.string' => 'The category must be a valid string.',
            'category.max' => 'The category must not exceed 100 characters.',

            'image_url.url' => 'The image URL must be a valid URL.',
            'image_url.max' => 'The image URL must not exceed 2048 characters.',
        ];
    }

}
