<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],

            'name' => ['required', 'string', 'max:255'],

            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],

            'sku' => ['required', 'string', 'max:100', 'unique:products,sku'],

            'short_description' => ['nullable', 'string'],

            'description' => ['nullable', 'string'],

            'price' => ['required', 'numeric', 'min:0'],

            'discount_price' => [
                'nullable',
                'numeric',
                'min:0',
                'lte:price',
            ],

            'stock' => ['required', 'integer', 'min:0'],

            'status' => ['required', 'boolean'],
        ];
    }
}