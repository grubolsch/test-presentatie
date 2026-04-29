<?php

namespace Tests\Unit\Oefening3;

use App\Exercises\Oefening3\AgeValidator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 3 — AgeValidator & exceptions
 * ----------------------------------------
 * AgeValidator::validate(int $age): void
 *   → doet niets als de leeftijd geldig is (0–150)
 *   → gooit een InvalidArgumentException als de leeftijd ongeldig is
 *
 * Nieuwe techniek — exception testen:
 *
 *   $this->expectException(InvalidArgumentException::class);
 *   $validator->validate(-1);   ← dit moet de exception gooien
 *
 * Je roept expectException() aan VÓÓR de code die de exception gooit.
 * PHPUnit vangt hem op en markeert de test als geslaagd.
 */
class AgeValidatorTest extends TestCase
{
    private AgeValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new AgeValidator();
    }

    // --- Happy path ---

    /** @test */
    public function geldige_leeftijd_nul_gooit_geen_exception(): void
    {
        // validate(0) mag geen exception gooien.
        // Als er geen exception is, slaagt de test vanzelf.
        // TODO
    }

    /** @test */
    public function geldige_leeftijd_honderdvijftig_gooit_geen_exception(): void
    {
        // TODO
    }

    /** @test */
    public function geldige_leeftijd_midden_gooit_geen_exception(): void
    {
        // TODO: kies een leeftijd zoals 30 of 75
    }

    // --- Exception cases ---

    /** @test */
    public function negatieve_leeftijd_gooit_exception(): void
    {
        // TODO: gebruik $this->expectException(...) en roep daarna validate(-1) aan
    }

    /** @test */
    public function leeftijd_boven_honderdvijftig_gooit_exception(): void
    {
        // TODO
    }

    /** @test */
    public function exception_bevat_de_ongeldige_waarde_in_het_bericht(): void
    {
        // Tip: gebruik ook $this->expectExceptionMessage('151')
        // om te controleren dat de foutmelding de waarde 151 bevat
        // TODO
    }
}
