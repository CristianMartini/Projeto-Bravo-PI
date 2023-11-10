<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        if ($usuario) {
            $carrinho = Carrinho::with('carrinhoItens.produto')->where('USUARIO_ID', $usuario->USUARIO_ID)->first();

            return view('carrinho.index', compact('carrinho'));
        } else {
            // Lógica para lidar com usuário não autenticado
            return redirect()->route('login')->with('error', 'Faça login para acessar o carrinho.');
        }
    }

    public function adicionarAoCarrinho(Request $request, Produto $produto)
    {
        $usuario = Auth::user();

        if ($usuario) {
            $carrinho = Carrinho::where('USUARIO_ID', $usuario->USUARIO_ID)->first();

            if ($carrinho) {
                // Atualize a quantidade do item no carrinho, se ele já existir
                $carrinho->carrinhoItens()->updateOrCreate(
                    ['PRODUTO_ID' => $produto->PRODUTO_ID],
                    ['ITEM_QTD' => $request->input('quantidade')]
                );
            } else {
                // Crie um novo carrinho se não existir
                $carrinho = Carrinho::create(['USUARIO_ID' => $usuario->USUARIO_ID]);

                // Adicione o item ao carrinho
                $carrinho->carrinhoItens()->create([
                    'PRODUTO_ID' => $produto->PRODUTO_ID,
                    'ITEM_QTD' => $request->input('quantidade'),
                ]);
            }

            return redirect()->route('checkout')->with('success', 'Produto adicionado ao carrinho com sucesso');
        } else {
            // O usuário não está autenticado, redirecione para a página de login ou exiba uma mensagem de erro
            return redirect()->route('login')->with('error', 'Faça login para adicionar produtos ao carrinho.');
        }
    }
}
