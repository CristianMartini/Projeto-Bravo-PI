<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
  public $timestamps=false;
    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID';
    protected $fillable = [
        'USUARIO_ID',
        'ENDERECO_ID',
        'STATUS_ID',
        'PEDIDO_DATA'

    ];
    // Relação com Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'USUARIO_ID');
    }
    public function status()
    {
        return $this->belongsTo(PedidoStatus::class, 'STATUS_ID');
    }

    public function pedidoItens()
    {
        return $this->hasMany(Pedido::class, 'PEDIDO_ID');
    }
    use HasFactory;
}
