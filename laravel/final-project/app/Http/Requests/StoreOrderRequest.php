<?php

namespace App\Http\Requests;

use App\Enums\OrderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'orderer_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function passedValidation()
    {
        $this->merge([
            'status' => OrderStatusEnum::Pending->value
        ]);
    }
}
