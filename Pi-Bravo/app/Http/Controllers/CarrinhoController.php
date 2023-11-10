<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{

    public function index()
    {
        // Recupere os itens do carrinho do usuário autenticado

        $categorias = Categoria::all();
        $carrinhoItens = Carrinho::where('USUARIO_ID', auth()->user()->USUARIO_ID)->get();

        return view('carrinho.index', compact('carrinhoItens'), compact('categorias'));
    }

    public function removerDoCarrinho($carrinhoItemId)
    {
        $carrinhoItem = Carrinho::find($carrinhoItemId);
        if ($carrinhoItem) {
            $carrinhoItem->delete();
        }
        return redirect()->route('carrinho.index')->with('success', 'Produto removido do carrinho.');
    }


public function adicionarAoCarrinho(Request $request, $produtoId)
{
    if (auth()->check()) {
        $user = auth()->user();
        $carrinhoItem = Carrinho::where('USUARIO_ID', $user->USUARIO_ID)
            ->where('PRODUTO_ID', $produtoId)
            ->first();
        if ($carrinhoItens) {
            $carrinhoItens->ITEM_QTD += 1;
            $carrinhoItens->save();
        } else {
            Carrinho::create([
                'USUARIO_ID' => $user->USUARIO_ID,
                'PRODUTO_ID' => $produtoId,
                'ITEM_QTD' => 1
            ]);
        }
        return redirect()->route('carrinho.index')->with('success', 'Produto adicionado ao carrinho.');
    } else {
        // Se o usuário não estiver autenticado, redirecione para a página de login
        return redirect()->route('login')->with('error', 'Você precisa fazer login para adicionar produtos ao carrinho.');
    }
}

}
