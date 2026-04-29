<?php

namespace Tests\Unit\Oefening7;

use App\Exercises\Oefening7\AuthService;
use App\Exercises\Oefening7\UserConfigLoader;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 7 — AuthService & gecombineerde mocks
 * ------------------------------------------------
 * AuthService::login(string $username, string $password): bool
 *   → true   als de combinatie klopt
 *   → false  als de gebruiker niet bestaat of het wachtwoord onjuist is
 *   → gooit InvalidArgumentException als username of password leeg is
 *
 * De klasse leest gebruikers via een UserConfigLoader (interface).
 * In productie laadt die uit een .ini bestand — maar in tests mocken we dat.
 *
 * WAAROM MOCKEN?
 *   De echte IniUserConfigLoader leest van schijf en gooit een RuntimeException
 *   als het bestand niet bestaat. In unit tests wil je geen bestandssysteem nodig
 *   hebben. De mock geeft een vaste array terug die jij zelf bepaalt.
 *
 * WACHTWOORDEN HASHEN IN TESTS:
 *   AuthService gebruikt password_verify() intern. Jij hebt gehashte wachtwoorden
 *   nodig in de nep-data. Genereer ze éénmalig zo:
 *
 *   password_hash('geheim123', PASSWORD_BCRYPT)
 *   // → '$2y$10$...'  (elke keer anders, maar password_verify() herkent ze altijd)
 *
 *   Of gebruik de constante onderaan dit bestand als startpunt.
 *
 * STUB INSTELLEN (waarde teruggeven):
 *   $loader = $this->createMock(UserConfigLoader::class);
 *   $loader->method('load')->willReturn([
 *       'alice' => password_hash('geheim123', PASSWORD_BCRYPT),
 *   ]);
 *
 * GECOMBINEERD (stub + mock):
 *   $loader->expects($this->once())->method('load')->willReturn([...]);
 *   // → controleert én dat load() aangeroepen wordt én geeft data terug
 *
 * NUTTIGE ASSERTIONS:
 *   $this->assertTrue($result)
 *   $this->assertFalse($result)
 *   $this->expectException(InvalidArgumentException::class)
 *
 * NUTTIGE TESTS OM TE SCHRIJVEN:
 *   Happy path:
 *     - Correcte username + wachtwoord → true
 *   Foute combinaties:
 *     - Juiste username, fout wachtwoord → false
 *     - Onbekende username              → false
 *   Validatie (exceptions):
 *     - Lege username                   → InvalidArgumentException
 *     - Leeg wachtwoord                 → InvalidArgumentException
 *   Loader-aanroep:
 *     - Controleer dat load() precies één keer aangeroepen wordt per login-poging
 */
class AuthServiceTest extends TestCase
{
    // Herbruikbare nep-gebruikersdata — genereer je eigen hashes met:
    // php -r "echo password_hash('geheim123', PASSWORD_BCRYPT);"
    private const USERS = [
        'alice' => '', // TODO: vervang door password_hash('geheim123', PASSWORD_BCRYPT)
        'bob'   => '', // TODO: vervang door password_hash('welkom01', PASSWORD_BCRYPT)
    ];

    private UserConfigLoader $loader;
    private AuthService $auth;

    protected function setUp(): void
    {
        $this->loader = $this->createMock(UserConfigLoader::class);
        $this->auth   = new AuthService($this->loader);
    }

    // --- Happy path ---

    /** @test */
    public function correcte_combinatie_geeft_true(): void
    {
        // Stel de loader in zodat hij USERS teruggeeft
        // $this->loader->method('load')->willReturn(self::USERS);

        // Roep login() aan met een geldige combinatie
        // $result = $this->auth->login('alice', 'geheim123');

        // TODO: assertTrue($result)
    }

    // --- Foute combinaties ---

    /** @test */
    public function fout_wachtwoord_geeft_false(): void
    {
        // TODO
    }

    /** @test */
    public function onbekende_gebruiker_geeft_false(): void
    {
        // TODO: login('mallory', 'willekeurig') → false
    }

    // --- Validatie ---

    /** @test */
    public function lege_username_gooit_exception(): void
    {
        // TODO: expectException + login('', 'geheim123')
    }

    /** @test */
    public function leeg_wachtwoord_gooit_exception(): void
    {
        // TODO
    }

    // --- Loader-interactie ---

    /** @test */
    public function loader_wordt_precies_eenmaal_aangeroepen_per_login(): void
    {
        // Tip: gebruik expects($this->once()) op de loader
        // $this->loader->expects($this->once())->method('load')->willReturn(self::USERS);
        // TODO: voer login() uit en laat PHPUnit de verwachting verifiëren
    }

    /** @test */
    public function loader_wordt_niet_aangeroepen_bij_lege_invoer(): void
    {
        // Bij een lege username gooit login() meteen een exception —
        // de loader hoeft dan nooit aangeroepen te worden.
        // Tip: $this->loader->expects($this->never())->method('load');
        // TODO
    }
}
