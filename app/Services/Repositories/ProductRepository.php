<?php

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Product;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        $this->model = new Product();
    }

    public function getProductsByIds(array $ids): Collection
    {
        return $this->model->query()->whereIn('id', $ids)->get();
    }
}
