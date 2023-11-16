<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class CartItem extends Model
{
    public $timestamps=false;
    protected $table = 'CARRINHO_ITEM';
    public $incrementing = false;
    protected $primaryKey = ['USUARIO_ID', 'PRODUTO_ID']; // Chave primária composta
    protected $fillable = ['USUARIO_ID', 'PRODUTO_ID', 'ITEM_QTD'];

    // Restante do seu código...

    public function product()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }
    use HasFactory;
}
