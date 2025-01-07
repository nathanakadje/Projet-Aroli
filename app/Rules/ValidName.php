<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[a-zA-Z]+$/', $value)) {
            $fail("The {$attribute} must contain only letters.");
        
        }
    }
   
    public function message()
    {
        return 'Le champ :attribute doit contenir uniquement des lettres et des espaces.';
    }
}
