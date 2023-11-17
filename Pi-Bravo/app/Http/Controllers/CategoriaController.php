<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
   
    public function show(Categoria $id)
{ 
    return view ('categoria.show', ['categorias' => Categoria::where('CATEGORIA_ID', $id->CATEGORIA_ID),  'produtos' => Produto::where('CATEGORIA_ID')]);
}
}
