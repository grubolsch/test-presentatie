<?php

namespace Tests\Unit\Oefening4;

use App\Exercises\Oefening4\TemperatureConverter;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 4 — TemperatureConverter & DataProviders
 * ---------------------------------------------------
 * TemperatureConverter heeft drie methoden:
 *   celsiusToFahrenheit(float $celsius): float
 *   fahrenheitToCelsius(float $fahrenheit): float
 *   celsiusToKelvin(float $celsius): float
 *     → gooit InvalidArgumentException als celsius < -273.15 (absoluut nulpunt)
 *
 * Formules:
 *   °C → °F : celsius × 9/5 + 32
 *   °F → °C : (fahrenheit − 32) × 5/9
 *   °C → K  : celsius + 273.15
 *
 * NIEUWE TECHNIEK — DataProvider:
 * Schrijf één testmethode en laat PHPUnit hem uitvoeren voor elke invoerset.
 *
 *   #[DataProvider('celsiusNaarFahrenheitProvider')]
 *   public function test_celsius_naar_fahrenheit(float $celsius, float $verwacht): void
 *   {
 *       $this->assertEqualsWithDelta($verwacht, $this->converter->celsiusToFahrenheit($celsius), 0.01);
 *   }
 *
 *   public static function celsiusNaarFahrenheitProvider(): array
 *   {
 *       return [
 *           'vriespunt'   => [0.0,   32.0],
 *           'kookpunt'    => [100.0, 212.0],
 *           'lichaamstemperatuur' => [37.0, 98.6],
 *       ];
 *   }
 *
 * NUTTIGE ASSERTIONS:
 *   $this->assertEqualsWithDelta($verwacht, $werkelijk, $delta)
 *     → past bij floats: kleine afrondingsverschillen worden getolereerd
 *     → gebruik delta 0.01 voor twee decimalen nauwkeurigheid
 *   $this->expectException(InvalidArgumentException::class)
 *
 * NUTTIGE TESTS OM TE SCHRIJVEN:
 *   celsiusToFahrenheit:
 *     - 0°C   → 32°F   (vriespunt)
 *     - 100°C → 212°F  (kookpunt)
 *     - -40°C → -40°F  (het punt waar de schalen samenkomen)
 *     - 37°C  → 98.6°F (lichaamstemperatuur)
 *   fahrenheitToCelsius:
 *     - 32°F  → 0°C
 *     - 212°F → 100°C
 *     - 98.6°F → 37°C
 *   celsiusToKelvin:
 *     - 0°C   → 273.15 K
 *     - 100°C → 373.15 K
 *     - -273.15°C gooit geen exception (absoluut nulpunt zelf is geldig)
 *     - -274°C gooit InvalidArgumentException
 *
 * TIP: De sleutel van elke rij in de provider (bijv. 'vriespunt') verschijnt
 *      in de PHPUnit-output als de test faalt. Kies beschrijvende namen.
 */
class TemperatureConverterTest extends TestCase
{
    private TemperatureConverter $converter;

    protected function setUp(): void
    {
        $this->converter = new TemperatureConverter();
    }

    // --- celsiusToFahrenheit ---

    #[DataProvider('celsiusNaarFahrenheitProvider')]
    public function test_celsius_naar_fahrenheit(float $celsius, float $verwacht): void
    {
        // TODO: assertEqualsWithDelta($verwacht, $this->converter->celsiusToFahrenheit($celsius), 0.01)
    }

    public static function celsiusNaarFahrenheitProvider(): array
    {
        return [
            // TODO: vul minstens 3 rijen in  [celsius, verwacht_fahrenheit]
            // 'vriespunt' => [0.0, 32.0],
        ];
    }

    // --- fahrenheitToCelsius ---

    #[DataProvider('fahrenheitNaarCelsiusProvider')]
    public function test_fahrenheit_naar_celsius(float $fahrenheit, float $verwacht): void
    {
        // TODO
    }

    public static function fahrenheitNaarCelsiusProvider(): array
    {
        return [
            // TODO
        ];
    }

    // --- celsiusToKelvin ---

    /** @test */
    public function nulpunt_celsius_is_correct_in_kelvin(): void
    {
        // 0°C → 273.15 K
        // TODO: assertEqualsWithDelta(273.15, ..., 0.001)
    }

    /** @test */
    public function absoluut_nulpunt_gooit_geen_exception(): void
    {
        // -273.15°C is de grens — dit is nog geldig
        // TODO: roep celsiusToKelvin(-273.15) aan; als er geen exception is slaagt de test
    }

    /** @test */
    public function onder_absoluut_nulpunt_gooit_exception(): void
    {
        // TODO: expectException + celsiusToKelvin(-274.0)
    }
}
