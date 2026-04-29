<?php

namespace App\Exercises\Oefening2;

class ShoppingCart
{
    private array $items = [];

    public function addItem(string $name, float $price, int $qty): void
    {
        $this->items[] = [
            'name'  => $name,
            'price' => $price,
            'qty'   => $qty,
        ];
    }

    public function getTotal(): float
    {
        return array_sum(
            array_map(fn($item) => $item['price'] * $item['qty'], $this->items)
        );
    }

    public function getItemCount(): int
    {
        return array_sum(array_column($this->items, 'qty'));
    }
}
