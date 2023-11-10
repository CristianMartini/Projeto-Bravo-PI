<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    // app\Models\Endereco.php

    use HasFactory;

    protected $table = 'ENDERECO';
    protected $primaryKey = 'ENDERECO_ID';
    public $timestamps = false; // Se não tiver colunas 'created_at' e 'updated_at'

    protected $fillable = [
        'USUARIO_ID',
        'ENDERECO_NOME',
        'ENDERECO_LOGRADOURO',
        'ENDERECO_NUMERO',
        'ENDERECO_COMPLEMENTO',
        'ENDERCO_CEP',
        'ENDERECO_CIDADE',
        'ENDERECO_ESTADO',
    ];

    // Relacionamento com usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID', 'USUARIO_ID');
    }


    use HasFactory;
}
