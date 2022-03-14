<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Repository\Eloquent\EloquentRepositoryInterface;

interface CategoryRepositoryInterface extends EloquentRepositoryInterface
{
    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Category;

    public function update(int $modelId, array $payload): bool;

    public function delete(int $modelId): bool;
}
