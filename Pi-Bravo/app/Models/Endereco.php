<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $primaryKey = 'ENDERECO_ID';
    public $timestamps=false;
    protected $table = 'ENDERECO';
    protected $fillable = ['USUARIO_ID', 'ENDERECO_NOME', 'ENDERECO_LOGRADOURO', 'ENDERECO_NUMERO', 'ENDERECO_COMPLEMENTO', 'ENDERECO_CEP', 'ENDERECO_CIDADE', 'ENDERECO_ESTADO'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID');
    }
    use HasFactory;
}
