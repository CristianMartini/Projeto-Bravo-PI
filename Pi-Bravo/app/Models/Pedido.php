<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID';
    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'ENDERECO',
        'STATUS_ID',
        'PEDIDO_DATA',
    ];

  

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID', 'id');
    }

    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class, 'PEDIDO_ID', 'PEDIDO_ID');
    }

    use HasFactory;
}
