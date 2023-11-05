<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMyTicketsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'priority_id' => 'required|numeric|exists:ticket_priorities,id',
            'category_id' => 'required|numeric|exists:ticket_categories,id',
            'subject' => 'required',
            'description' => 'required|max:120|min:2',
            'file' => 'mimes:jpeg,png,txt,jpg',
        ];
    }
}
