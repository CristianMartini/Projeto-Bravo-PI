<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index()
    {

        // Sua lógica existente...
        $produtos = Produto::all();
        $categorias = Categoria::all();

        // Adicionar a lógica para obter dois produtos aleatórios
        $doisProdutos = Produto::with('ProdutoImagens')
            ->inRandomOrder()
            ->take(1)
            ->get();

        // Passar todos os produtos e as categorias, além dos dois produtos, para a view
        return view('home', compact('produtos', 'categorias', 'doisProdutos'));
    }

    public function show($produtoId, Request $request)
{
    $produto = Produto::find($produtoId);
    $quantidadeAtual = $request->input('quantidade', 1);

    return view('produto.show', [
        'produto' => $produto,'quantidadeAtual' => $quantidadeAtual

    ]);
}




public function pesquisar(Request $request)
{
    $query = $request->input('query');
    $titulo = "Resultados da pesquisa: " . $query; // Título dinâmico

    $produtos = Produto::where('PRODUTO_NOME', 'like', '%' . $query . '%')
                       ->orWhereHas('categorias', function ($q) use ($query) {
                           $q->where('CATEGORIA_NOME', 'like', '%' . $query . '%');
                       })
                       ->distinct()
                       ->get();

    return view('pesquisar', compact('produtos','titulo'));
}



public function produtosPorCategoria($categoria_id)
{
    $categoria = Categoria::with('produtos')->find($categoria_id);
    if (!$categoria) {
        return redirect()->back()->with('erro', 'Categoria não encontrada.');
    }

    return view('categoria.produtos', ['categoria' => $categoria]);
}




}
