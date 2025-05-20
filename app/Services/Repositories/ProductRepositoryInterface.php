<?php

declare(strict_types=1);

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getProductsByIds(array $ids): Collection;
}
