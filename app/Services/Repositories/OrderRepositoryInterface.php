<?php

declare(strict_types=1);

namespace App\Services\Repositories;

use App\Models\Order;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithProducts(int $id): ?Order;
}
