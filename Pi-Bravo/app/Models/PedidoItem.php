<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $fillable = ['PEDIDO_ID', 'PRODUTO_ID', 'ITEM_QTD', 'ITEM_PRECO'];
    protected $table = 'PEDIDO_ITEM';
    public $incrementing = false;
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }

    use HasFactory;
}
