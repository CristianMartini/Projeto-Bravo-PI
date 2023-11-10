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

    public function pedidoItens()
    {
        return $this->hasMany(PedidoItem::class, 'PEDIDO_ID', 'PEDIDO_ID');
    }
    public function pedidoStatus()
    {
    return $this->belongsTo(PedidoStatus::class, 'STATUS_ID');
    }
    public function endereco()
	{
		return $this->belongsTo(Endereco::class, 'ENDERECO_ID');
	}
    use HasFactory;
}
