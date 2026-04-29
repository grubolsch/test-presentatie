<?php

namespace App\Exercises\Oefening7;

use RuntimeException;

/**
 * Laadt gebruikers uit een .ini bestand.
 *
 * Bestandsformaat (users.ini):
 *   alice = $2y$10$...  (bcrypt hash)
 *   bob   = $2y$10$...
 */
class IniUserConfigLoader implements UserConfigLoader
{
    public function __construct(private string $path) {}

    public function load(): array
    {
        if (!file_exists($this->path)) {
            throw new RuntimeException("Config bestand niet gevonden: {$this->path}");
        }

        $users = parse_ini_file($this->path);

        if ($users === false) {
            throw new RuntimeException("Config bestand kon niet worden gelezen: {$this->path}");
        }

        return $users;
    }
}
