<?php

namespace Tests\Unit\Oefening1;

use App\Exercises\Oefening1\StringHelper;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 1 — StringHelper
 * --------------------------
 * De klasse StringHelper heeft één methode:
 *   isPalindrome(string $s): bool
 *
 * Een palindroom is een woord dat van voor naar achter hetzelfde is,
 * waarbij hoofdletters en spaties genegeerd worden.
 *
 * Jouw taak: schrijf de ontbrekende tests hieronder.
 *
 * NUTTIGE ASSERTIONS:
 *   $this->assertTrue($expr)   → de expressie moet true zijn
 *   $this->assertFalse($expr)  → de expressie moet false zijn
 *
 * NUTTIGE TESTS OM TE SCHRIJVEN:
 *   - "racecar"  → is een palindroom            (assertTrue)
 *   - "hello"    → is geen palindroom           (assertFalse)
 *   - ""         → lege string is een palindroom (assertTrue)
 *   - "A man a plan a canal Panama" → true      (case+spaties worden genegeerd)
 *
 * TIP: setUp() maakt al een $this->helper aan, die gebruik je in elke test.
 */
class StringHelperTest extends TestCase
{
    private StringHelper $helper;

    protected function setUp(): void
    {
        $this->helper = new StringHelper();
    }

    /** @test */
    public function racecar_is_een_palindroom(): void
    {
        // TODO: roep $this->helper->isPalindrome('racecar') aan
        //       en gebruik assertTrue om te controleren dat het resultaat true is
    }

    /** @test */
    public function hello_is_geen_palindroom(): void
    {
        // TODO
    }

    /** @test */
    public function lege_string_is_een_palindroom(): void
    {
        // TODO
    }

    /** @test */
    public function palindroom_is_hoofdletterongevoelig_en_negeert_spaties(): void
    {
        // Input: "A man a plan a canal Panama"
        // Verwacht: true
        // TODO
    }
}
