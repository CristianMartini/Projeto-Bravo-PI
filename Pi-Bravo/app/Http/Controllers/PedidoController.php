<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show', ['pedido' => $pedido]);
    }

    public function store(Request $request)
    {
        // Lógica para criar um novo pedido com base nos dados do formulário
        $pedido = Pedido::create([
            'USUARIO_ID' => auth()->id(),
            'ENDERECO' => $request->input('ENDERECO'),
            'STATUS_ID' => 1, // Status inicial do pedido
            'PEDIDO_DATA' => now(), // Data atual
        ]);

        // Lógica para adicionar itens ao pedido, se necessário

        return redirect()->route('pedidos.show', ['pedido' => $pedido->PEDIDO_ID]);
    }

}
