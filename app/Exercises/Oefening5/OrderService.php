<?php

namespace App\Exercises\Oefening5;

class OrderService
{
    public function __construct(private MailerInterface $mailer) {}

    public function placeOrder(string $customerEmail, string $productName): void
    {
        // Bestelverwerking...

        $this->mailer->send(
            $customerEmail,
            'Bestellingsbevestiging',
            "Bedankt voor je bestelling van {$productName}!"
        );
    }
}
