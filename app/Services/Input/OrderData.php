<?php

declare(strict_types=1);

namespace App\Services\Input;

class OrderData
{
    private string $customerName;
    private string $customerEmail;
    private array $products;

    public function __construct(string $customerName, string $customerEmail)
    {
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
    }

    public function pushProduct(int $id, int $quantity): void
    {
        $this->products[] = ['id' => $id, 'quantity' => $quantity];
    }

    public function getProductIds(): array
    {
        $result = [];

        foreach ($this->products as $product) {
            $result[] = $product['id'];
        }

        return $result;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
