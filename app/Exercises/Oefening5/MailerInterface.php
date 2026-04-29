<?php

namespace App\Exercises\Oefening5;

interface MailerInterface
{
    public function send(string $to, string $subject, string $body): void;
}
