<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'user_id' => 'required|bigint|integer',
        'payment_id' => 'required|bigint|integer',
        'delivery_id'=>'required|bigint|integer',
        'order_id' => 'required|bigint|integer',
           'product_id' => 'required|bigint|integer',
        ];
    }
}
