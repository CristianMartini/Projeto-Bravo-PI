<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{

    public function create()
    {
        return view('endereco.create'); // Nome da sua view
    }

    public function show($id)
{
    // Encontra o endereço pelo ID, ou falha se não encontrado
    $endereco = Endereco::findOrFail($id);

    // Retorna a view com os detalhes do endereço
    return view('endereco.show', compact('endereco'));
}





    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'ENDERECO_NOME' => 'required|max:255',
            'ENDERECO_LOGRADOURO' => 'required|max:255',
            'ENDERECO_NUMERO' => 'required|max:255',
            'ENDERECO_COMPLEMENTO' => 'nullable|max:255',
            'ENDERECO_CEP' => 'required|size:8',
            'ENDERECO_CIDADE' => 'required|max:255',
            'ENDERECO_ESTADO' => 'required|size:2'
        ]);

        // Adiciona o ID do usuário autenticado
        $validatedData['USUARIO_ID'] = Auth::id();

        // Salva o endereço no banco de dados
        Endereco::create($validatedData);

        // Redireciona para a página do carrinho com uma mensagem de sucesso
        return redirect()->route('carrinho')->with('success', 'Endereço cadastrado com sucesso.');
    }
}

