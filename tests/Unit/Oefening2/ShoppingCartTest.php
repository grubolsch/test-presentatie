<?php

namespace Tests\Unit\Oefening2;

use App\Exercises\Oefening2\ShoppingCart;
use PHPUnit\Framework\TestCase;

/**
 * OEFENING 2 — ShoppingCart
 * --------------------------
 * ShoppingCart heeft drie methoden:
 *   addItem(string $name, float $price, int $qty): void
 *   getTotal(): float   → prijs × aantal voor alle items opgeteld
 *   getItemCount(): int → totaal aantal stuks in de cart
 *
 * NUTTIGE ASSERTIONS:
 *   $this->assertSame(expected, actual)   → strict gelijkheid (type + waarde)
 *   $this->assertEquals(expected, actual) → losse gelijkheid (handig voor floats)
 *   $this->assertSame(0, $cart->getItemCount())
 *   $this->assertEquals(25.0, $cart->getTotal())
 *
 * NUTTIGE TESTS OM TE SCHRIJVEN:
 *   - Lege cart heeft total 0.0
 *   - Lege cart heeft 0 items
 *   - Na 1 item met qty 2 en prijs 12.50 → total = 25.00
 *   - Meerdere items opgeteld → correcte total
 *   - getItemCount telt aantallen uit alle items bij elkaar
 *
 * TIP: setUp() maakt elke keer een verse $this->cart aan,
 *      zodat tests elkaar niet beïnvloeden.
 */
class ShoppingCartTest extends TestCase
{
    private ShoppingCart $cart;

    protected function setUp(): void
    {
        $this->cart = new ShoppingCart();
    }

    /** @test */
    public function nieuwe_cart_heeft_total_van_nul(): void
    {
        // TODO: controleer dat getTotal() 0.0 teruggeeft op een lege cart
    }

    /** @test */
    public function nieuwe_cart_heeft_nul_items(): void
    {
        // TODO
    }

    /** @test */
    public function total_klopt_na_toevoegen_van_een_item(): void
    {
        // Voeg toe: 'Boek', prijs 12.50, qty 2  → total moet 25.00 zijn
        // TODO
    }

    /** @test */
    public function item_count_klopt_na_meerdere_toevoegingen(): void
    {
        // Voeg toe: 'Boek' qty 2 en 'Pen' qty 3  → count moet 5 zijn
        // TODO
    }

    /** @test */
    public function total_klopt_na_meerdere_items(): void
    {
        // 'Laptop'  prijs 999.00 qty 1
        // 'Muis'    prijs  25.00 qty 2
        // Verwacht total: 1049.00
        // TODO
    }
}
