<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoEstoque extends Model
{

    protected $table = 'PRODUTO_ESTOQUE';
    protected $primaryKey = 'PRODUTO_ID';
    public $timestamps = false;

    public function produto()
	{
		return $this->belongsTo(Produto::class, 'PRODUTO_ID');
	}
    use HasFactory;
}
