<?php

namespace Tests\Unit\Oefening4;

use App\Exercises\Oefening4\Calculator;
use DivisionByZeroError;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 4 — Calculator & DataProviders
 * -----------------------------------------
 * Calculator heeft vier methoden: add, subtract, multiply, divide.
 * divide() gooit een DivisionByZeroError als $b === 0.
 *
 * Nieuwe techniek — DataProvider:
 * Schrijf één testmethode die je met meerdere invoersets uitvoert.
 *
 *   #[DataProvider('optelsommenProvider')]
 *   public function test_optellen(int $a, int $b, int $expected): void
 *   {
 *       $this->assertSame($expected, $this->calculator->add($a, $b));
 *   }
 *
 *   public static function optelsommenProvider(): array
 *   {
 *       return [
 *           'positief'  => [1, 2, 3],
 *           'nul'       => [0, 0, 0],
 *           'negatief'  => [-1, 1, 0],
 *       ];
 *   }
 *
 * PHPUnit voert de test eenmaal uit per rij in de provider.
 * De sleutel van de rij ('positief', 'nul', ...) verschijnt in de output.
 */
class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    // --- add ---

    #[DataProvider('optelsommenProvider')]
    public function test_optellen(int $a, int $b, int $expected): void
    {
        // TODO: assertSame($expected, $this->calculator->add($a, $b))
    }

    public static function optelsommenProvider(): array
    {
        return [
            // TODO: vul minstens 3 rijen in  [a, b, verwacht]
            // 'positief' => [1, 2, 3],
        ];
    }

    // --- subtract ---

    #[DataProvider('aftrekProvider')]
    public function test_aftrekken(int $a, int $b, int $expected): void
    {
        // TODO
    }

    public static function aftrekProvider(): array
    {
        return [
            // TODO
        ];
    }

    // --- multiply ---

    #[DataProvider('vermenigvuldigingProvider')]
    public function test_vermenigvuldigen(int $a, int $b, int $expected): void
    {
        // TODO
    }

    public static function vermenigvuldigingProvider(): array
    {
        return [
            // TODO: denk ook aan vermenigvuldigen met 0 en met negatieve getallen
        ];
    }

    // --- divide ---

    /** @test */
    public function delen_geeft_juist_resultaat(): void
    {
        // TODO: 10 / 2 = 5.0
    }

    /** @test */
    public function delen_door_nul_gooit_error(): void
    {
        // TODO: gebruik $this->expectException(DivisionByZeroError::class)
    }
}
