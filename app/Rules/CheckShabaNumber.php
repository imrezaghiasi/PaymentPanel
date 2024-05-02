<?php

namespace App\Rules;

use App\Models\Bank;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckShabaNumber implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $shaba_identifiers = Bank::pluck('shaba_identifier')->toArray();
        $first_two_digits = substr($value, 0, 2);
        if (!in_array($first_two_digits, $shaba_identifiers)) {
            $fail('شماره شبا وارد شده در سیستم موجود نمی باشد.');
        }
    }
}
