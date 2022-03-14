<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Category constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Category
    {
        return $this->model->select($columns)->where('id_categoria_planejamento', $modelId)->get()->first();
    }

    public function update(int $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    public function delete(int $modelId): bool
    {
        return $this->findById($modelId)->forceDelete();
    }
}
