<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;


    protected $table = 'PEDIDO_ITEM';
    public $timestamps = false;

    protected $fillable = [
        'PRODUTO_ID',
        'PEDIDO_ID',
        'ITEM_QTD',
        'ITEM_PRECO',
    ];

    // Adicione os relacionamentos conforme necessário

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID', 'PEDIDO_ID');
    }
}
