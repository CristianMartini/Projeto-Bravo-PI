<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PedidoStatus;
use Illuminate\Http\Request;

class PedidoStatusController extends Controller
{
    public function index()
    {
        $pedidoStatus = PedidoStatus::all();
        return view('pedidoStatus.index', compact('pedidoStatus'));
    }
}
