<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'PRODUTO';
    protected $primaryKey = 'PRODUTO_ID';

    public function produtoImagens()
    {
        return $this->hasMany(ProdutoImagem::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function carrinhoItens()
    {
        return $this->hasMany(CarrinhoItem::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }


	public function pedidoItem()
	{
		return $this->hasOne(PedidoItem::class, 'PRODUTO_ID');
	}

	public function produtoEstoque()
	{
		return $this->hasOne(ProdutoEstoque::class, 'PRODUTO_ID');
	}
}
