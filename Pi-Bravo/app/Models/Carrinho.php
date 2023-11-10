<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{

    protected $table = 'CARRINHO_ITEM';
    public $timestamps = false;

    protected $fillable = [
        'ITEM_QTD',
        'USUARIO_ID',
        'PRODUTO_ID'
    ];

    public function usuario()
    {
        return $this->hasMany(Usuario::class, 'USUARIO_ID', 'USUARIO_ID');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }
    public function carrinhoItens()
    {
        return $this->hasMany(CarrinhoItem::class, 'USUARIO_ID', 'USUARIO_ID');
    }



    use HasFactory;
}
