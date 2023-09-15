<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDiscountCodeRequest extends FormRequest
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
            'code' => [
                'required',
                'max:15',
                Rule::unique('discount_codes')->ignore($_REQUEST['code'] , 'code')
            ],
            'amount_type' => 'required|integer',
            'amount' => 'required|integer',
            'type' => 'required|integer',
            'user_id' => 'integer',
            'start_date' => 'required|numeric',
            'end_date' => 'required|numeric',
        ];
    }
}
