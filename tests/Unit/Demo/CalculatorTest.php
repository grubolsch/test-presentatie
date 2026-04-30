<?php

namespace Tests\Unit\Demo;

use App\Exercises\Demo\Calculator;
use DivisionByZeroError;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function test_optellen(int $a, int $b, int $expected): void
    {
        // TODO
    }

    public function test_aftrekken(int $a, int $b, int $expected): void
    {
        // TODO
    }

    public function test_vermenigvuldigen(int $a, int $b, int $expected): void
    {
        // TODO
    }

    public function test_delen(): void
    {
        // TODO
    }

    public function test_delen_door_nul_gooit_error(): void
    {
        // TODO
    }
}
