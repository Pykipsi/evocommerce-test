<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;
use App\Services\Input\OrderData;

interface OrderServiceInterface
{
    public function find(int $id): ?Order;

    public function store(OrderData $orderData): Order;
}
