<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\CartItem;
use App\Models\PedidoItem;
use App\Models\PedidoStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function listarPedidos()
    {
        $usuarioId = Auth::id(); // Obtém o ID do usuário logado
        $usuario = User::find($usuarioId);
        $pedidos = DB::table('PEDIDO')
        ->join('PEDIDO_ITEM', 'PEDIDO.PEDIDO_ID', '=', 'PEDIDO_ITEM.PEDIDO_ID')
        ->join('PRODUTO', 'PEDIDO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
        ->leftJoin('PRODUTO_IMAGEM', function ($join) {
            $join->on('PRODUTO.PRODUTO_ID', '=', 'PRODUTO_IMAGEM.PRODUTO_ID')
                 ->where('PRODUTO_IMAGEM.IMAGEM_ORDEM', '=', 1); // Supondo que a primeira imagem está com IMAGEM_ORDEM = 1
        })
        ->join('PEDIDO_STATUS', 'PEDIDO.STATUS_ID', '=', 'PEDIDO_STATUS.STATUS_ID')
        ->join('ENDERECO', 'PEDIDO.ENDERECO_ID', '=', 'ENDERECO.ENDERECO_ID')
        ->select(
                'PEDIDO.PEDIDO_ID',
                'PEDIDO.PEDIDO_DATA',
                'PEDIDO_STATUS.STATUS_DESC AS STATUS_PEDIDO',
                'ENDERECO.ENDERECO_NOME',
                'ENDERECO.ENDERECO_LOGRADOURO',
                'ENDERECO.ENDERECO_NUMERO',
                'ENDERECO.ENDERECO_COMPLEMENTO',
                'ENDERECO.ENDERECO_CEP',
                'ENDERECO.ENDERECO_CIDADE',
                'ENDERECO.ENDERECO_ESTADO',
                'PEDIDO_ITEM.PRODUTO_ID',
                'PRODUTO.PRODUTO_NOME',
                'PEDIDO_ITEM.ITEM_QTD',
                'PEDIDO_ITEM.ITEM_PRECO',
                'PRODUTO.PRODUTO_PRECO',
                'PRODUTO.PRODUTO_DESCONTO',
                'PRODUTO_IMAGEM.IMAGEM_URL'
            )
            ->where('PEDIDO.USUARIO_ID', '=', $usuarioId)
            ->orderBy('PEDIDO.PEDIDO_DATA', 'desc')
            ->get();

        return view('pedido.listar', compact('pedidos','usuario'));
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

    return redirect()->route('pedido.listar');
}

public function cancelarPedido($pedidoId)
{
    $usuarioId = Auth::id();
    $pedido = Pedido::where('PEDIDO_ID', $pedidoId)
                    ->where('USUARIO_ID', $usuarioId)
                    ->first();

    if (!$pedido) {
        return back()->with('error', 'Pedido não encontrado.');
    }

    // Atualiza o status do pedido para cancelado
    $pedido->update(['STATUS_ID' => 3]);

    // Opcional: Atualizar a quantidade dos itens do pedido para 0
    PedidoItem::where('PEDIDO_ID', $pedidoId)->update(['ITEM_QTD' => 0]);

    return redirect()->route('pedido.listar')->with('success', 'Pedido cancelado com sucesso.');
}
}
