<?php

namespace App\Services\Repositories;

use App\Models\Order;

class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{
    public function __construct()
    {
        $this->model = new Order();
    }

    public function findWithProducts(int $id): ?Order
    {
        return $this->model->with('products')->find($id);
    }
}
