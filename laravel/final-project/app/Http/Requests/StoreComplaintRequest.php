<?php

namespace App\Http\Requests;

use App\Enums\ComplaineeTypeEnum;
use App\Enums\ComplainerTypeEnum;
use App\Models\Courier;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PolymorphicExists;

class StoreComplaintRequest extends FormRequest
{
    public $complainerModel;
    public $complaineeModel;
    public function prepareForValidation()
    {

        $complainerModel = "App\Models\\$this->complainer_type";
        $complaineeModel = "App\Models\\$this->complainee_type";

        $this->complainerModel = $complainerModel;
        $this->complaineeModel = $complaineeModel;

        $this->merge([
            'complainer_type' => $complainerModel,
            'complainee_type' => $complaineeModel,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'complainer_id' => ['required', 'integer', new PolymorphicExists($this->complainerModel)],
            'complainer_type' => ['required', 'in:' . implode(',', ComplainerTypeEnum::getValues())],
            'content' => ['required', 'string', 'max:2000'],
            'complainee_id' => ['required', 'integer', new PolymorphicExists($this->complaineeModel)],
            'complainee_type' => ['required', 'in:' . implode(',', ComplaineeTypeEnum::getValues())],
        ];
    }
}
