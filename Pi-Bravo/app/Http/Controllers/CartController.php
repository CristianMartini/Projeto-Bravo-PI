<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function adicionar(Request $request, $produtoId)
{
    $usuarioId = Auth::id();
    $quantidadeAdicional = $request->input('quantidade', 1);

    // Verifica se o item já existe no carrinho
    $cartItem = CartItem::where('USUARIO_ID', $usuarioId)
                  ->where('PRODUTO_ID', $produtoId)
                  ->first();

    if ($cartItem) {
        // Se existir, atualiza a quantidade

          CartItem::where('USUARIO_ID', $usuarioId)
          ->where('PRODUTO_ID', $produtoId)
          ->update(['ITEM_QTD' => $cartItem->ITEM_QTD + $quantidadeAdicional]);
    } else {
        // Se não existir, cria um novo registro
        CartItem::insert([
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
    $itensCarrinho = CartItem::with('produto')
                             ->where('USUARIO_ID', $usuarioId)
                             ->where('ITEM_QTD', '>', 0)
                             ->get();
    $enderecos = Endereco::where('USUARIO_ID', $usuarioId)->get();
    $temEnderecos = $enderecos->isNotEmpty();

    $precoTotal = 0;
    $totalDesconto = 0;
    $precoTotalSemDesconto = 0;

    foreach ($itensCarrinho as $item) {
        $precoTotal += ($item->produto->PRODUTO_PRECO * $item->ITEM_QTD)-($item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD);

        $totalDesconto += ($item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD);

        $precoTotalSemDesconto += (($item->produto->PRODUTO_PRECO ) * $item->ITEM_QTD);
    }

    return view('carrinho.show', compact('itensCarrinho', 'precoTotal', 'totalDesconto', 'precoTotalSemDesconto', 'enderecos', 'temEnderecos'));
}




    public function atualizarCarrinho(Request $request, $produtoId)
{
    $usuarioId = Auth::id();
    $quantidade = $request->input('quantidade', 1);

    CartItem::where('USUARIO_ID', $usuarioId)
      ->where('PRODUTO_ID', $produtoId)
      ->update(['ITEM_QTD' => $quantidade]);

    return redirect()->route('carrinho')->with('success', 'Carrinho atualizado!');
}

public function removerDoCarrinho($produtoId)
{
    $usuarioId = Auth::id();

    CartItem::where('USUARIO_ID', $usuarioId)
      ->where('PRODUTO_ID', $produtoId)
      ->update(['ITEM_QTD' => 0]);

    return redirect()->route('carrinho')->with('success', 'Produto removido do carrinho!');
}



public function salvarEscolhaEndereco(Request $request)
{
    $enderecoId = $request->input('endereco_id');
    session(['enderecoEscolhido' => $enderecoId]);

    return response()->json(['success' => true]);
}

}
