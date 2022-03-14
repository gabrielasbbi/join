<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tb_categoria_produto';

    public $timestamps = false;

    public $primaryKey = 'id_categoria_planejamento';

    public $fillable = [
        'id_categoria_planejamento',
        'nome_categoria',
    ];

    /** @var string $nomeCategoria */
    public $nomeCategoria;

    /**
     * @return string
     */
    public function getNomeCategoria(): string
    {
        return $this->nomeCategoria;
    }

    /**
     * @param string $nomeCategoria
     */
    public function setNomeCategoria(string $nomeCategoria): void
    {
        $this->nomeCategoria = $nomeCategoria;
    }
}
