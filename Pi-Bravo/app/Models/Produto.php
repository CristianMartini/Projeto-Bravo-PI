<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'PRODUTO';
    protected $primaryKey = 'PRODUTO_ID';


    public function ProdutoImagens(){
        return $this -> hasMany(ProdutoImagem::class,'PRODUTO_ID','PRODUTO_ID');
    }
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'CATEGORIA_ID', 'CATEGORIA_ID');
    }
}
