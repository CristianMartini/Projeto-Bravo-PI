<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function show($id)
    {
        $categoria = Categoria::with('Produtos')->find($id);
        $categorias = Categoria::all(); // Carrega todas as categorias para a navbar

        if (!$categoria) {
            return redirect()->route('home'); // Redireciona se a categoria não for encontrada
        }

        return view('categoria.show', [
            'categoria' => $categoria,
            'categorias' => $categorias  // Passa as categorias para a view
        ]);
    }

}


