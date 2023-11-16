<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class PedidoStatus extends Model
{
    public $timestamps=false;
    protected $table = 'PEDIDO_STATUS';
    protected $primaryKey = 'STATUS_ID'; // Ajuste para a chave primária correta

    // Relações
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'STATUS_ID');
    }

    use HasFactory;
}
