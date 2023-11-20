<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{

    public function mostrarPedido()
    {
        $usuarioId = Auth::id();
        $pedidos = Pedido::with(['itens', 'itens.produto', 'status'])
                         ->where('USUARIO_ID', $usuarioId)
                         ->get();

        return view('pedido', compact('pedidos'));
    }

    public function adicionarAoPedido(Request $request, $pedidoId, $produtoId)
    {
        $quantidade = $request->input('ITEM_QTD', 1);

        PedidoItem::updateOrCreate(
            ['PEDIDO_ID' => $pedidoId, 'PRODUTO_ID' => $produtoId],
            ['ITEM_QTD' => $quantidade]
        );

        return back()->with('success', 'Item adicionado ao pedido');
    }

    public function finalizar(Request $request)
{
    $usuarioId = Auth::id();

    // Criar ou atualizar o endereço
    $endereco = Endereco::updateOrCreate(
        ['USUARIO_ID' => $usuarioId],
        [
            'ENDERECO_NOME' => $request->input('ENDERECO_NOME'),
            'ENDERECO_LOGRADOURO' => $request->input('ENDERECO_LOGRADOURO'),
            'ENDERECO_NUMERO' => $request->input('ENDERECO_NUMERO'),
            'ENDERECO_COMPLEMENTO' => $request->input('ENDERECO_COMPLEMENTO'),
            'ENDERECO_CEP' => $request->input('ENDERECO_CEP'),
            'ENDERECO_CIDADE' => $request->input('ENDERECO_CIDADE'),
            'ENDERECO_ESTADO' => $request->input('ENDERECO_ESTADO')
        ]
    );

    // Criar um novo pedido
    $pedido = Pedido::create([
        'USUARIO_ID' => $usuarioId,
        'ENDERECO_ID' => $endereco->ENDERECO_ID,
        'STATUS_ID' => 1,
        'PEDIDO_DATA' => now()
    ]);

    if (!$pedido->id) {
        // Tratar o caso de falha na criação do pedido
        return back()->withErrors('Falha ao criar o pedido.');
    }

    // Mover itens do carrinho para o pedido
    $itensCarrinho = CartItem::where('USUARIO_ID', $usuarioId)->get();
    foreach ($itensCarrinho as $item) {
        PedidoItem::create([
            'PEDIDO_ID' => $pedido->id, // Certifique-se de que isto não é null
            'PRODUTO_ID' => $item->PRODUTO_ID,
            'ITEM_QTD' => $item->ITEM_QTD
        ]);

        // Opcional: remover o item do carrinho após adicioná-lo ao pedido
        // $item->delete();
    }

    return redirect()->route('pedidos.listar')->with('success', 'Pedido finalizado com sucesso!');
}


    public function listarPedidos()
    {
        $usuarioId = Auth::id();

        // Busca todos os pedidos do usuário autenticado
        $pedidos = Pedido::with('itens.produto')
                         ->where('USUARIO_ID', $usuarioId)
                         ->orderBy('created_at', 'desc')
                         ->get();

        return view('pedidos.listar', compact('pedidos'));
    }
}
