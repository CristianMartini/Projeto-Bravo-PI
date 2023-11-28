<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $table = "PEDIDO_ITEM";
    protected $primaryKey = ['PRODUTO_ID', 'PEDIDO_ID'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'PRODUTO_ID',
        'PEDIDO_ID',
        'ITEM_QTD',
        'ITEM_PRECO'
    ];


    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }
    protected function setKeysForSaveQuery($query)
    {
        return $query->where('PEDIDO_ID', $this->getAttribute('PEDIDO_ID'))
            ->where('PRODUTO_ID', $this->getAttribute('PRODUTO_ID'));
    }
    use HasFactory;
}
