<?php

declare(strict_types=1);

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\{Collection, Model};

abstract class AbstractRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Model
    {
        return $this->model->query()->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->query()->create($data);
    }

    public function update($id, array $data): Model
    {
        $record = $this->find($id);
        $record->update($data);

        return $record;
    }

    public function delete($id): int
    {
        return $this->model->destroy($id);
    }
}
