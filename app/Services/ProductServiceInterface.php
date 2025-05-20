<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Product;
use App\Services\Input\ProductData;

interface ProductServiceInterface
{
    public function find(int $id): ?Product;

    public function listOfProducts(): ?Collection;

    public function create(ProductData $productData): Product;

    public function update(int $productId, ProductData $productData): Product;

    public function delete(int $id): void;
}
