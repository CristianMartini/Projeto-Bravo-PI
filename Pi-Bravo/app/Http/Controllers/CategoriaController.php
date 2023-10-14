<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria){
        return view('home', ['produtos' => $categoria -> Produtos, 'categorias' => Categoria::all()]);
    }


}
