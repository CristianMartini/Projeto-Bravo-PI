<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\CartItem;
use App\Models\PedidoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    // Lista todos os pedidos do usuário
    public function listarPedidos()
{
    $usuarioId = Auth::id();
    $pedidos = Pedido::with(['pedidoItens.produto', 'status', 'endereco'])
                     ->where('USUARIO_ID', $usuarioId)
                     ->orderBy('PEDIDO_DATA', 'desc')
                     ->get();

    return view('pedidos.listar', compact('pedidos'));
}


public function criarPedido()
{
    $usuarioId = Auth::id();
    $enderecoId = session('enderecoEscolhido');

    if (!$enderecoId) {
        return back()->withErrors('Endereço não selecionado.');
    }

    DB::beginTransaction();
    try {
        $pedido = Pedido::create([
            'USUARIO_ID' => $usuarioId,
            'ENDERECO_ID' => $enderecoId,
            'STATUS_ID' => 1, // Status inicial
            'PEDIDO_DATA' => now()
        ]);

        $itensCarrinho = CartItem::where('USUARIO_ID', $usuarioId)->get();
        foreach ($itensCarrinho as $item) {
            PedidoItem::create([
                'PEDIDO_ID' => $pedido->id,
                'PRODUTO_ID' => $item->PRODUTO_ID,
                'ITEM_QTD' => $item->ITEM_QTD,
                'ITEM_PRECO' => $item->produto->PRODUTO_PRECO
            ]);

            // Opcional: Remove o item do carrinho
            $item->delete();
        }

        DB::commit();
        return redirect()->route('pedido.show', $pedido->id)->with('success', 'Pedido criado com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors('Erro ao criar o pedido: ' . $e->getMessage());
    }
}

}
