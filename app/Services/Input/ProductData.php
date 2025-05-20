<?php

declare(strict_types=1);

namespace App\Services\Input;

class ProductData
{
    private ?int $stockQuantity;
    private ?float $price;
    private ?string $name;
    private ?string $description;

    public function __construct
    (
        ?string $name,
        ?string $description,
        ?float  $price,
        ?int    $stockQuantity
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stockQuantity = $stockQuantity;
    }

    public function getForStore(): array
    {
        $result = [
            'name' => $this->name,
            'description' => $this->description,
        ];

        if ($this->stockQuantity) {
            $result['stock_quantity'] = $this->stockQuantity;
        }

        if ($this->price) {
            $result['price'] = $this->price;
        }

        return $result;
    }

    public function getForUpdate(): array
    {
        return array_filter([
            'name' => $this->name ?? null,
            'description' => $this->description ?? null,
            'stock_quantity' => $this->stockQuantity ?? null,
            'price' => $this->price ?? null,
        ], fn($value) => $value !== null && $value !== '');
    }
}
