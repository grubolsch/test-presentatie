<?php

namespace Tests\Unit\Oefening6;

use App\Exercises\Oefening6\DailyGreeter;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 6 — DailyGreeter & Carbon tijd-mocking
 * -------------------------------------------------
 * DailyGreeter::greet(): string
 *   Geeft een begroeting terug op basis van het huidige uur:
 *     06:00–11:59  → 'Goedemorgen'
 *     12:00–17:59  → 'Goedemiddag'
 *     18:00–22:59  → 'Goedenavond'
 *     23:00–05:59  → 'Goedenacht'
 *
 * PROBLEEM:
 *   De klasse roept Carbon::now() aan. Dat geeft de échte systeemtijd terug.
 *   Als je nu gewoon greet() aanroept, hangt de uitkomst af van wanneer
 *   de test draait — dat is niet deterministisch en dus niet te testen.
 *
 * OPLOSSING — Carbon::setTestNow():
 *   Carbon heeft een ingebouwde "nep-klok". Je zet hem vóór je test,
 *   en reset hem erna zodat andere tests niet beïnvloed worden.
 *
 *   Carbon::setTestNow('2025-01-01 09:00:00'); // klok staat stil op 09:00
 *   // ... test uitvoeren ...
 *   Carbon::setTestNow(null);                  // klok herstellen
 *
 *   Of gebruik tearDown() om altijd op te ruimen:
 *
 *   protected function tearDown(): void
 *   {
 *       Carbon::setTestNow(null);
 *   }
 *
 * NUTTIGE ASSERTIONS:
 *   $this->assertSame('Goedemorgen', $greeter->greet())
 *
 * NUTTIGE TESTS OM TE SCHRIJVEN:
 *   - 09:00 → 'Goedemorgen'
 *   - 12:00 → 'Goedemiddag'  (exacte grens)
 *   - 17:59 → 'Goedemiddag'  (laatste minuut middag)
 *   - 18:00 → 'Goedenavond'  (exacte grens)
 *   - 23:30 → 'Goedenacht'
 *   - 05:00 → 'Goedenacht'   (vroeg in de ochtend)
 *
 * TIP: Grenzen testen (bijv. precies 12:00 of 17:59) is belangrijk —
 *      dit zijn "edge cases" waar off-by-one fouten het vaakst optreden.
 */
class DailyGreeterTest extends TestCase
{
    private DailyGreeter $greeter;

    protected function setUp(): void
    {
        $this->greeter = new DailyGreeter();
    }

    protected function tearDown(): void
    {
        // Reset de nep-klok zodat andere tests niet beïnvloed worden
        Carbon::setTestNow(null);
    }

    /** @test */
    public function geeft_goedemorgen_in_de_ochtend(): void
    {
        // Zet de klok op 09:00
        // Carbon::setTestNow('2025-01-01 09:00:00');
        // TODO: roep greet() aan en controleer de uitkomst
    }

    /** @test */
    public function geeft_goedemiddag_op_het_middaguur(): void
    {
        // Zet de klok op 12:00 — exacte grens van middag
        // TODO
    }

    /** @test */
    public function geeft_goedemiddag_net_voor_avond(): void
    {
        // Zet de klok op 17:59 — laatste minuut van de middag
        // TODO
    }

    /** @test */
    public function geeft_goedenavond_bij_het_begin_van_de_avond(): void
    {
        // Zet de klok op 18:00 — exacte grens van avond
        // TODO
    }

    /** @test */
    public function geeft_goedenacht_laat_op_de_avond(): void
    {
        // Zet de klok op 23:30
        // TODO
    }

    /** @test */
    public function geeft_goedenacht_vroeg_in_de_ochtend(): void
    {
        // Zet de klok op 05:00
        // TODO
    }
}
