<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PolymorphicExists implements ValidationRule
{
    protected $model;
    public function __construct(string $model)
    {
        $this->model = $model;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->model::where('id', $value)->doesntExist()) {
            $fail("The selected $attribute is invalid.");
        }
    }
}
