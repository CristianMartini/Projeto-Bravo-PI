<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function show($id)
{
    $categoria = Categoria::with('Produtos')->find($id);

    if (!$categoria) {
        return redirect()->route('home');
    }

    return view('categoria.show', compact('categoria'));
}
}
