<?php

namespace Tests\Unit\Oefening5;

use App\Exercises\Oefening5\MailerInterface;
use App\Exercises\Oefening5\OrderService;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 5 — OrderService & Mocks
 * -----------------------------------
 * OrderService::placeOrder(string $customerEmail, string $productName): void
 *   → verwerkt een bestelling en stuurt een bevestigingsmail via MailerInterface
 *
 * MailerInterface::send(string $to, string $subject, string $body): void
 *
 * Nieuwe techniek — Mock objects:
 * Een mock is een nep-implementatie van een interface die je zelf programmeert.
 * Je kunt daarmee controleren of een methode aangeroepen werd, hoe vaak,
 * en met welke argumenten.
 *
 *   $mailer = $this->createMock(MailerInterface::class);
 *
 *   // Stub: geef een vaste waarde terug (niet nodig hier, send() geeft void)
 *
 *   // Verwachting instellen (mock):
 *   $mailer->expects($this->once())       // exact 1x aangeroepen
 *          ->method('send')
 *          ->with(
 *              'klant@example.com',               // $to
 *              $this->stringContains('Bevestig'), // $subject bevat dit woord
 *              $this->stringContains('Laptop'),   // $body bevat productnaam
 *          );
 *
 *   $service = new OrderService($mailer);
 *   $service->placeOrder('klant@example.com', 'Laptop');
 *   // PHPUnit controleert automatisch of aan de verwachting voldaan is.
 *
 * Handige matchers:
 *   $this->once()                   → precies 1 aanroep
 *   $this->never()                  → nooit aangeroepen
 *   $this->exactly(2)               → precies 2 aanroepen
 *   $this->stringContains('tekst')  → argument bevat deze string
 *   $this->equalTo('exact')         → argument is exact gelijk
 */
class OrderServiceTest extends TestCase
{
    /** @test */
    public function place_order_stuurt_een_mail(): void
    {
        // Stap 1: maak een mock aan van MailerInterface
        // $mailer = $this->createMock(MailerInterface::class);

        // Stap 2: stel in dat send() precies één keer aangeroepen moet worden
        // $mailer->expects($this->once())->method('send');

        // Stap 3: maak OrderService aan met de mock als dependency
        // $service = new OrderService($mailer);

        // Stap 4: voer de actie uit
        // $service->placeOrder('klant@example.com', 'Laptop');

        // PHPUnit verifieert de verwachting automatisch na afloop van de test.
        $this->markTestIncomplete('Verwijder deze regel en schrijf de test.');
    }

    /** @test */
    public function mail_wordt_gestuurd_naar_het_klant_emailadres(): void
    {
        // Tip: gebruik ->with('verwacht@adres.com', ...) om het eerste argument te controleren
        // TODO
        $this->markTestIncomplete('Verwijder deze regel en schrijf de test.');
    }

    /** @test */
    public function mail_body_bevat_de_productnaam(): void
    {
        // Tip: gebruik $this->stringContains('Laptop') als matcher voor het derde argument
        // TODO
        $this->markTestIncomplete('Verwijder deze regel en schrijf de test.');
    }

    /** @test */
    public function mailer_wordt_niet_aangeroepen_zonder_place_order(): void
    {
        // Wat als we placeOrder() nooit aanroepen?
        // De mailer mag dan nooit send() aanroepen.
        // Tip: $mailer->expects($this->never())->method('send');
        // TODO
        $this->markTestIncomplete('Verwijder deze regel en schrijf de test.');
    }
}
