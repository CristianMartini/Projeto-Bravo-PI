<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ="USUARIO";
    public $timestamps = false;
    protected $primaryKey = "USUARIO_ID";
    protected $fillable = [
        'USUARIO_NOME',
        'USUARIO_SENHA',
        'USUARIO_EMAIL',
        'USUARIO_CPF'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'USUARIO_SENHA',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'USUARIO_SENHA' => 'hashed',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'USUARIO_ID');
    }
    public function enderecos()
    {
        return $this->belongsTo(Endereco::class, 'ENDERECO_ID');
    }
}
