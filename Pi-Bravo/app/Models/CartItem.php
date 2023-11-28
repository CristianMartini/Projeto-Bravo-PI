<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class CartItem extends Model
{
    protected $table = "CARRINHO_ITEM";
    protected $primaryKey = ['PRODUTO_ID', 'USUARIO_ID'];
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
            'USUARIO_ID',
            'PRODUTO_ID',
            'ITEM_QTD'
        ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }

    protected function setKeysForSaveQuery($query){
        return $query->where('USUARIO_ID', $this->getAttribute('USUARIO_ID'))
                     ->where('PRODUTO_ID', $this->getAttribute('PRODUTO_ID'));
    }


    use HasFactory;
}
