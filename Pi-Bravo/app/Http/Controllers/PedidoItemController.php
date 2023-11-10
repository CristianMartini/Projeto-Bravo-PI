<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PedidoItem;
use Illuminate\Http\Request;

class PedidoItemController extends Controller
{
    public function index()
    {
        $pedidoItens = PedidoItem::all();
        return view('pedidoItem.index', compact('pedidoItens'));
    }

}
