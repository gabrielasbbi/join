<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_produto';

    public $primaryKey = 'id_produto';

    public $timestamps = false;

    protected $fillable = [
        'id_produto',
        'id_categoria_produto',
        'data_cadastro',
        'nome_produto',
        'valor_produto',
    ];

    /** @var int $idCategoriaProduto */
    public $idCategoriaProduto;

    /** @var \DateTime $dataCadastro */
    public $dataCadastro;

    /** @var string $nomeProduto */
    public $nomeProduto;

    /** @var float $valorProduto */
    public $valorProduto;

    /**
     * @return int
     */
    public function getIdCategoriaProduto(): int
    {
        return $this->idCategoriaProduto;
    }

    /**
     * @param int $idCategoriaProduto
     */
    public function setIdCategoriaProduto(int $idCategoriaProduto): void
    {
        $this->idCategoriaProduto = $idCategoriaProduto;
    }

    /**
     * @return \DateTime
     */
    public function getDataCadastro(): \DateTime
    {
        return $this->dataCadastro;
    }

    /**
     * @param \DateTime $dataCadastro
     */
    public function setDataCadastro(\DateTime $dataCadastro): void
    {
        $this->dataCadastro = $dataCadastro;
    }

    /**
     * @return string
     */
    public function getNomeProduto(): string
    {
        return $this->nomeProduto;
    }

    /**
     * @param string $nomeProduto
     */
    public function setNomeProduto(string $nomeProduto): void
    {
        $this->nomeProduto = $nomeProduto;
    }

    /**
     * @return float
     */
    public function getValorProduto(): float
    {
        return $this->valorProduto;
    }

    /**
     * @param float $valorProduto
     */
    public function setValorProduto(float $valorProduto): void
    {
        $this->valorProduto = $valorProduto;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria');
    }
}
