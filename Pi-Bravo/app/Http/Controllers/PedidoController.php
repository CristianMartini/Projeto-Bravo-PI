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
                'ENDERECO_NOME' => $request->input('endereco_nome'),
                'ENDERECO_LOGRADOURO' => $request->input('endereco_logradouro'),
                'ENDERECO_NUMERO' => $request->input('endereco_numero'),
                'ENDERECO_COMPLEMENTO' => $request->input('endereco_complemento'),
                'ENDERECO_CEP' => $request->input('endereco_cep'),
                'ENDERECO_CIDADE' => $request->input('endereco_cidade'),
                'ENDERECO_ESTADO' => $request->input('endereco_estado')
            ]
        );

        // Criar um novo pedido
        $pedido = Pedido::create([
            'USUARIO_ID' => $usuarioId,
            'ENDERECO_ID' => $endereco->id,
            'STATUS_ID' => 1,
            'PEDIDO_DATA' => now() // Assumindo '1' como status inicial
        ]);

        // Mover itens do carrinho para o pedido
        $itensCarrinho = CartItem::where('USUARIO_ID', $usuarioId)->get();
        foreach ($itensCarrinho as $item) {
            PedidoItem::create([
                'PEDIDO_ID' => $pedido->id,
                'PRODUTO_ID' => $item->PRODUTO_ID,
                'ITEM_QTD' => $item->ITEM_QTD
                // Adicione outros campos necessários
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
