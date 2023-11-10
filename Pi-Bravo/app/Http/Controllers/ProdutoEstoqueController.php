<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdutoEstoque;
use Illuminate\Http\Request;

class ProdutoEstoqueController extends Controller
{
    public function index()
    {
        $estoques = ProdutoEstoque::all();
        return view('estoque.index', ['estoques' => $estoques]);
    }

    public function show(ProdutoEstoque $produtoEstoque)
    {
        return view('estoque.show', ['produtoEstoque' => $produtoEstoque]);
    }


}
