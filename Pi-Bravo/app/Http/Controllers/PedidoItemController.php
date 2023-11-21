<?php

namespace App\Http\Controllers;

use App\Models\PedidoItem;
use Illuminate\Http\Request;

class PedidoItemController extends Controller
{
    // Adiciona um item ao pedido
    public function store(Request $request)
    {
        $pedidoItem = PedidoItem::create($request->all());
        return response()->json(['success' => true, 'pedidoItem' => $pedidoItem]);
    }

    // Exibe um item específico do pedido
    public function show($id)
    {
        $pedidoItem = PedidoItem::find($id);
        return $pedidoItem ? response()->json($pedidoItem) : response()->json(['error' => 'Item não encontrado'], 404);
    }
}
