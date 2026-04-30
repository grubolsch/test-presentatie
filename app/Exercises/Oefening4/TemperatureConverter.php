<?php

namespace App\Exercises\Oefening4;

use InvalidArgumentException;

class TemperatureConverter
{
    public function celsiusToFahrenheit(float $celsius): float
    {
        return $celsius * 9 / 5 + 32;
    }

    public function fahrenheitToCelsius(float $fahrenheit): float
    {
        return ($fahrenheit - 32) * 5 / 9;
    }

    public function celsiusToKelvin(float $celsius): float
    {
        if ($celsius < -273.15) {
            throw new InvalidArgumentException(
                "Temperatuur kan niet lager zijn dan het absolute nulpunt (-273.15°C), {$celsius} gegeven."
            );
        }

        return $celsius + 273.15;
    }
}
