<?php

namespace App\Exercises\Oefening3;

use InvalidArgumentException;

class AgeValidator
{
    public function validate(int $age): void
    {
        if ($age < 0 || $age > 150) {
            throw new InvalidArgumentException(
                "Leeftijd moet tussen 0 en 150 liggen, {$age} gegeven."
            );
        }
    }
}
