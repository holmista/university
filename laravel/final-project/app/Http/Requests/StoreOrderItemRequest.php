<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderItemRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dish_id' => ['required', 'integer', 'exists:dishes,id'],
            'amount' => ['required', 'integer', 'min:1'],
            'order_id' => ['required', 'integer', 'exists:orders,id'],
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'Amount must be at least 1',
        ];
    }
}
