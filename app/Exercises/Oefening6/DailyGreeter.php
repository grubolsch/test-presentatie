<?php

namespace App\Exercises\Oefening6;

use Carbon\Carbon;

class DailyGreeter
{
    public function greet(): string
    {
        $hour = Carbon::now()->hour;

        return match (true) {
            $hour >= 6 && $hour < 12  => 'Goedemorgen',
            $hour >= 12 && $hour < 18 => 'Goedemiddag',
            $hour >= 18 && $hour < 23 => 'Goedenavond',
            default                   => 'Goedenacht',
        };
    }
}
