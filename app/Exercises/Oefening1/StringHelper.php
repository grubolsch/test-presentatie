<?php

namespace App\Exercises\Oefening1;

class StringHelper
{
    public function isPalindrome(string $s): bool
    {
        $clean = strtolower(preg_replace('/\s+/', '', $s));
        return $clean === strrev($clean);
    }
}
