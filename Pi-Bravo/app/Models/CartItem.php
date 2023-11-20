<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class CartItem extends Model
{
    public $timestamps=false;
    protected $table = 'CARRINHO_ITEM';
    public $incrementing = false;
 
    protected $fillable = ['USUARIO_ID', 'PRODUTO_ID', 'ITEM_QTD'];

    // Restante do seu código...

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }

    use HasFactory;
}
