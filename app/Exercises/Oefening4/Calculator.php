<?php

namespace App\Exercises\Oefening4;

use DivisionByZeroError;

class Calculator
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }

    public function subtract(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    public function divide(int $a, int $b): float
    {
        if ($b === 0) {
            throw new DivisionByZeroError('Deling door nul is niet toegestaan.');
        }

        return $a / $b;
    }
}
