<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:15',
            'introduction' => 'required',
            'image' => 'required|mimes:jpg,bmp,png',
            'price' => 'required|integer',
            'category_id' => 'required|min:1|max:100000000|exists:product_categories,id',
            'published_at' => 'required|numeric',
        ];
    }
}
