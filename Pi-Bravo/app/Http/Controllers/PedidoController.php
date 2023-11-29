<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\CartItem;
use App\Models\PedidoItem;
use App\Models\PedidoStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
{$usuarioId = Auth::id();
    $itensCarrinho = CartItem::where('USUARIO_ID', $usuarioId)->get();
    $enderecoId = session('enderecoEscolhido'); // Ou outra lógica para obter o endereço
    $totalCompra = 0;
    foreach ($itensCarrinho as $item) {
        $totalCompra += ($item->produto->PRODUTO_PRECO * $item->ITEM_QTD)-($item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD);
    }

    if ($totalCompra > 999.99) {
        // Redirecionar de volta com mensagem de erro
        return back()->with('error', 'O valor total da compra não pode exceder R$ 999,99.');
    }
    if (is_null($enderecoId)) {
        // Redirecionar de volta ou exibir uma mensagem de erro se o endereço não for selecionado
        return back()->with('error', 'Por favor, selecione um endereço para entrega.');
    }
    $status = PedidoStatus::where('STATUS_ID', 1)->value('STATUS_ID');
    $data = today()->format('Y-m-d');

    Pedido::create([
        'USUARIO_ID' =>  $usuarioId,
        'ENDERECO_ID' => $enderecoId,
        'STATUS_ID' => $status,
        'PEDIDO_DATA' => $data
    ]);
    $pedido_id = Pedido::orderBy('PEDIDO_ID', 'desc')->first()->PEDIDO_ID;
    foreach ($itensCarrinho as $item) {
        $precoTotalItem = ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO) * $item->ITEM_QTD;

        PedidoItem::create([
            'PRODUTO_ID' => $item->PRODUTO_ID,
            'PEDIDO_ID' => $pedido_id,
            'ITEM_QTD' => $item->ITEM_QTD,
            'ITEM_PRECO' => $precoTotalItem
        ]);

        // Atualizar a quantidade do item no carrinho para 0
        CartItem::where('USUARIO_ID', $usuarioId)->update(['ITEM_QTD' => 0]);
    }

    return redirect()->route('profile.show');
}

    public function delete($id)
    {
        $pedido = Pedido::find($id);
        $pedido->update(['STATUS_ID' => 2]);
        return redirect()->route('pedidos.index');
    }

    public function show()
{
    $user = Auth::user();
    $pedidos = $user->pedidos()->with(['itens.produto', 'status'])->get();

    return view('profile.show', compact('user', 'pedidos'));
}
}
