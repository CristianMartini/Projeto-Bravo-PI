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
   public function index(){


        return view('home', ['produtos' =>Produto::all(), 'categorias' =>Categoria::all()]);
    }


    public function show($produtoId)
{
    $produto = Produto::find($produtoId);
    $usuarioId = Auth::id();

    // Buscar o pedido ativo do usuário
    $pedidoAtivo = Pedido::where('USUARIO_ID', $usuarioId)
                         ->where('STATUS_ID', 1) // Supondo que 1 seja um pedido ativo
                         ->first();

    return view('produto.show', [
        'produto' => $produto,
        'pedidoId' => $pedidoAtivo ? $pedidoAtivo->PEDIDO_ID : null
    ]);
}




    public function pesquisar(Request $request)
{
    $query = $request->input('query');

    $produtos = Produto::where('PRODUTO_NOME', 'like', '%' . $query . '%')
                       ->orWhereHas('categoria', function ($q) use ($query) {
                           $q->where('CATEGORIA_NOME', 'like', '%' . $query . '%');
                       })
                       ->distinct()
                       ->groupBy('PRODUTO_ID') // Agrupa por PRODUTO_ID
                       ->get();

    return view('resultado_pesquisa', compact('produtos'));
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
