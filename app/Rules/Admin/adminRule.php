<?php

namespace App\Rules\Admin;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;

class adminRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $email='email';

$rules = [
    'email' => 'required|email|regex:/^admin_.*@gmail.com$/',
];

$validator = Validator::make(['email' => $email], $rules);

if ($validator->fails()) {
    // البريد الإلكتروني غير صالح
} else {
    // البريد الإلكتروني صالح
}
    }
}
