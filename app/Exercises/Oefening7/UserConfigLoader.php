<?php

namespace App\Exercises\Oefening7;

interface UserConfigLoader
{
    /**
     * Geeft alle gebruikers terug als associatieve array:
     * [ 'username' => 'gehashed_wachtwoord', ... ]
     */
    public function load(): array;
}
