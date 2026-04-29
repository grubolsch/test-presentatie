<?php

namespace App\Exercises\Oefening7;

use InvalidArgumentException;

class AuthService
{
    public function __construct(private UserConfigLoader $loader) {}

    /**
     * @throws InvalidArgumentException als username of password leeg is
     * @throws \RuntimeException        als de config niet geladen kan worden
     * @return bool true als de combinatie klopt, false als het wachtwoord onjuist is
     *              of de gebruiker niet bestaat
     */
    public function login(string $username, string $password): bool
    {
        if ($username === '' || $password === '') {
            throw new InvalidArgumentException('Username en wachtwoord mogen niet leeg zijn.');
        }

        $users = $this->loader->load();

        if (!array_key_exists($username, $users)) {
            return false;
        }

        return password_verify($password, $users[$username]);
    }
}
