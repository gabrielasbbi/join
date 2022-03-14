<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Repository\Eloquent\EloquentRepositoryInterface;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends EloquentRepositoryInterface
{
    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Product;

    public function update(int $modelId, array $payload): bool;

    public function delete(int $modelId): bool;

    public function allWithCategories(): Collection;
}
