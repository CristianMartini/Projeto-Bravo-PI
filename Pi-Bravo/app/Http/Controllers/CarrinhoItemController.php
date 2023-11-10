<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;

class CarrinhoItemController extends Controller
{
    public function index()
    {
        $carrinhoItens = CarrinhoItem::all();

        return view('carrinho.index', compact('carrinhoItens'));
    }
    public function show(CarrinhoItem $carrinhoItem)
    {
        return view('carrinho-item.show', ['carrinhoItem' => $carrinhoItem]);
    }
}
