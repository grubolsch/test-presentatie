# PHPUnit Oefeningen

Zeven oefeningen om PHPUnit te leren, opgebouwd van eenvoudig naar gevorderd.

## Setup

```bash
composer install
```

## Tests uitvoeren

```bash
# Alle oefeningen
composer test

# Per oefening
composer test-oefening1
composer test-oefening2
composer test-oefening3
composer test-oefening4
composer test-oefening5
composer test-oefening6
composer test-oefening7

# Demo
composer test-demo

# Of direct met phpunit
vendor/bin/phpunit
vendor/bin/phpunit tests/Unit/Oefening1
```

---

## Overzicht van de oefeningen

| #  | Onderwerp            | Nieuwe concepten                                                    |
|----|----------------------|---------------------------------------------------------------------|
| 1  | StringHelper         | `assertTrue`, `assertFalse`                                         |
| 2  | ShoppingCart         | `assertSame`, `assertEquals`, toestand testen                       |
| 3  | AgeValidator         | `expectException`, `expectExceptionMessage`                         |
| 4  | TemperatureConverter | `#[DataProvider]`, `assertEqualsWithDelta`                          |
| 5  | OrderService         | `createMock`, `expects`, `once()`, `stringContains`                 |
| 6  | DailyGreeter         | `Carbon::setTestNow`, tijd-afhankelijke logica, `tearDown`          |
| 7  | AuthService          | stub + mock gecombineerd, `willReturn`, `never()`                   |

---

## Structuur

```
app/Exercises/
├── Demo/Calculator.php              ← live demo tijdens de les
├── Oefening1/StringHelper.php
├── Oefening2/ShoppingCart.php
├── Oefening3/AgeValidator.php
├── Oefening4/TemperatureConverter.php
├── Oefening5/
│   ├── MailerInterface.php
│   └── OrderService.php
├── Oefening6/DailyGreeter.php
└── Oefening7/
    ├── UserConfigLoader.php     (interface)
    ├── IniUserConfigLoader.php  (echte implementatie)
    └── AuthService.php

tests/Unit/
├── Demo/CalculatorTest.php          ← live demo tijdens de les
├── Oefening1/StringHelperTest.php
├── Oefening2/ShoppingCartTest.php
├── Oefening3/AgeValidatorTest.php
├── Oefening4/TemperatureConverterTest.php
├── Oefening5/OrderServiceTest.php
├── Oefening6/DailyGreeterTest.php
└── Oefening7/AuthServiceTest.php
```

---

## Demo — Calculator

De `Demo/` map bevat een `Calculator` klasse en een leeg testbestand dat live ingevuld wordt tijdens de les. De Calculator heeft vier methoden: `add`, `subtract`, `multiply`, `divide`. `divide()` gooit een `DivisionByZeroError` als de deler nul is.

---

## Oefening 1 — StringHelper *(assertTrue / assertFalse)*

**Concept:** De eenvoudigste assertions. Controleer of een boolean expressie klopt.

De klasse `StringHelper` heeft één methode: `isPalindrome(string $s): bool`.
Schrijf tests die bevestigen welke strings wél en niet een palindroom zijn.

---

## Oefening 2 — ShoppingCart *(assertSame / assertEquals)*

**Concept:** Toestand testen. Voeg items toe en controleer of de berekeningen kloppen.

`assertSame` is strikt (controleert ook type), `assertEquals` is losser (handig bij floats).

---

## Oefening 3 — AgeValidator *(expectException)*

**Concept:** Testen dat een methode een exception gooit.

```php
$this->expectException(InvalidArgumentException::class);
$this->expectExceptionMessage('151'); // optioneel: controleer de foutmelding
$validator->validate(151);
```

Roep `expectException()` altijd **vóór** de code die de exception gooit.

---

## Oefening 4 — TemperatureConverter *(DataProvider + assertEqualsWithDelta)*

**Concept:** Één testmethode uitvoeren met meerdere invoersets. Bij floats gebruik je `assertEqualsWithDelta` in plaats van `assertSame`, zodat kleine afrondingsverschillen geen valse fout opleveren.

```php
#[DataProvider('celsiusNaarFahrenheitProvider')]
public function test_celsius_naar_fahrenheit(float $celsius, float $verwacht): void
{
    $this->assertEqualsWithDelta($verwacht, $this->converter->celsiusToFahrenheit($celsius), 0.01);
}

public static function celsiusNaarFahrenheitProvider(): array
{
    return [
        'vriespunt'           => [0.0,   32.0],
        'kookpunt'            => [100.0, 212.0],
        'lichaamstemperatuur' => [37.0,  98.6],
    ];
}
```

De sleutel van elke rij (`'vriespunt'`, `'kookpunt'`, ...) verschijnt in de output als de test faalt.

---

## Oefening 5 — OrderService *(Mocks)*

**Concept:** Een nep-implementatie van een interface injecteren en controleren of methoden correct aangeroepen worden.

```php
$mailer = $this->createMock(MailerInterface::class);

$mailer->expects($this->once())
       ->method('send')
       ->with(
           'klant@example.com',
           $this->stringContains('Bevestig'),
           $this->stringContains('Laptop'),
       );

$service = new OrderService($mailer);
$service->placeOrder('klant@example.com', 'Laptop');
```

PHPUnit verifieert de verwachting automatisch na de test.

---

## Oefening 6 — DailyGreeter *(Carbon::setTestNow)*

**Concept:** Tijd-afhankelijke code testen door de klok te bevriezen.

`DailyGreeter::greet()` roept `Carbon::now()` aan — de uitkomst hangt af van het uur.
Zonder de klok te mocken is de test niet deterministisch.

```php
Carbon::setTestNow('2025-01-01 09:00:00'); // klok staat stil
$this->assertSame('Goedemorgen', $greeter->greet());
Carbon::setTestNow(null);                  // altijd herstellen in tearDown()
```

Test ook de grenzen: precies 12:00, 17:59, 18:00 — daar zitten de meeste bugs.

---

## Oefening 7 — AuthService *(stub + mock gecombineerd)*

**Concept:** Een mock die ook een waarde teruggeeft (`willReturn`), gecombineerd met verificatie van aanroepen.

```php
$loader = $this->createMock(UserConfigLoader::class);
$loader->expects($this->once())
       ->method('load')
       ->willReturn(['alice' => password_hash('geheim123', PASSWORD_BCRYPT)]);

$auth = new AuthService($loader);
$this->assertTrue($auth->login('alice', 'geheim123'));
```

Gebruik `$this->never()` om te controleren dat de loader *niet* aangeroepen wordt bij ongeldige invoer.
