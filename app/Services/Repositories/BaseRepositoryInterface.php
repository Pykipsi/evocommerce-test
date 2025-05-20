<?php

declare(strict_types=1);

namespace App\Services\Repositories;

interface BaseRepositoryInterface
{
    public function all();

    public function find(int $id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
