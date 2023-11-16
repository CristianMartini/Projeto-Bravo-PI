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
        if (!$categoria) {
            return redirect()->route('home'); // Ou outra ação se categoria não for encontrada
        }
dd($categoria);
        return view('categoria.show', [            'categoria' => $categoria,
        ]);

    }
}



