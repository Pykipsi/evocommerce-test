<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Product;
use App\Services\Input\ProductData;
use App\Services\Repositories\ProductRepositoryInterface;

readonly class ProductService implements ProductServiceInterface
{
    public function __construct(private ProductRepositoryInterface $productRepository)
    {
    }

    public function find(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }

    public function listOfProducts(): ?Collection
    {
        return $this->productRepository->all();
    }

    public function create(ProductData $productData): Product
    {
        return $this->productRepository->create($productData->getForStore());
    }

    public function update(int $productId, ProductData $productData): Product
    {
        return $this->productRepository->update($productId, $productData->getForUpdate());
    }

    public function delete(int $id): void
    {
        $this->productRepository->delete($id);
    }
}
