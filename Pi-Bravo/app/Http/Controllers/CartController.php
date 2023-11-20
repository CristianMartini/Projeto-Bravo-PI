<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function adicionar(Request $request, $produtoId)
{
    $usuarioId = Auth::id();
    $quantidadeAdicional = $request->input('quantidade', 1);

    // Verifica se o item já existe no carrinho
    $cartItem = DB::table('CARRINHO_ITEM')
                  ->where('USUARIO_ID', $usuarioId)
                  ->where('PRODUTO_ID', $produtoId)
                  ->first();

    if ($cartItem) {
        // Se existir, atualiza a quantidade
        DB::table('CARRINHO_ITEM')
          ->where('USUARIO_ID', $usuarioId)
          ->where('PRODUTO_ID', $produtoId)
          ->update(['ITEM_QTD' => $cartItem->ITEM_QTD + $quantidadeAdicional]);
    } else {
        // Se não existir, cria um novo registro
        DB::table('CARRINHO_ITEM')->insert([
            'USUARIO_ID' => $usuarioId,
            'PRODUTO_ID' => $produtoId,
            'ITEM_QTD' => $quantidadeAdicional
        ]);
    }

    return redirect()->route('carrinho')->with('success', 'Produto adicionado ao carrinho');
}


    public function mostrarCarrinho()
    {
        $usuarioId = Auth::id();
        $itensCarrinho = CartItem::with('produto')->where('USUARIO_ID', $usuarioId)->get();

        $precoTotal = $itensCarrinho->reduce(function ($carry, $item) {
            return $carry + ($item->produto->PRODUTO_PRECO * $item->ITEM_QTD )-($item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD );
        }, 0);

        return view('carrinho.show', compact('itensCarrinho', 'precoTotal'));
    }


    public function atualizarCarrinho(Request $request, $produtoId)
{
    $usuarioId = Auth::id();
    $quantidade = $request->input('quantidade', 1);

    DB::table('CARRINHO_ITEM')
      ->where('USUARIO_ID', $usuarioId)
      ->where('PRODUTO_ID', $produtoId)
      ->update(['ITEM_QTD' => $quantidade]);

    return redirect()->route('carrinho')->with('success', 'Carrinho atualizado!');
}

    public function removerDoCarrinho($produtoId)
    {
        $usuarioId = Auth::id();

        DB::table('CARRINHO_ITEM')
          ->where('USUARIO_ID', $usuarioId)
          ->where('PRODUTO_ID', $produtoId)
          ->delete();

        return redirect()->route('carrinho')->with('success', 'Produto removido do carrinho!');
    }







    public function checkout()
    {
        $usuarioId = Auth::id();
        $itensCarrinho = CartItem::with('produto')->where('USUARIO_ID', $usuarioId)->get();
dd( $itensCarrinho);
        return view('checkout', compact('itensCarrinho'));
    }
}
