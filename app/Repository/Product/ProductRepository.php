<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * Product constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function findById(int $modelId, array $columns = ['*'], array $relations = [], array $appends = []): ?Product
    {
        return $this->model->select($columns)->where('id_produto', $modelId)->get()->first();
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

    public function allWithCategories(): Collection
    {
        return DB::table($this->model->getTable())
            ->join('tb_categoria_produto', $this->model->getTable().'.id_categoria_produto', '=', 'tb_categoria_produto.id_categoria_planejamento')
            ->select($this->model->getTable().'.*', 'tb_categoria_produto.*')
            ->get();
    }
}
