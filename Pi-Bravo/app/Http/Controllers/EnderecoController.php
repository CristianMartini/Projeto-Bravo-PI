<?php

// app\Http\Controllers\EnderecoController.php
namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all();
        return view('endereco.index', compact('enderecos'));
    }

    public function create()
    {
        return view('endereco.create');
    }

    public function store(Request $request)
    {
        Endereco::create($request->all());
        return redirect()->route('endereco.index');
    }
}
