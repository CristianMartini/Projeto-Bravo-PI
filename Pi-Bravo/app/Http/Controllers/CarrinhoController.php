<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index(){

        return view('produto.show', ['carrinho'=>Carrinho::all() ]);
    }

    public function adicionarAoCarrinho(Request $request, Produto $produto)
    {
        $usuario = Auth::user();

        if ($usuario) {
            $carrinho = Carrinho::where('USUARIO_ID', $usuario->USUARIO_ID)
                ->where('PRODUTO_ID', $produto->PRODUTO_ID)
                ->first();

            if ($carrinho) {
                // Atualize a quantidade do item no carrinho, se ele já existir
                $carrinho->ITEM_QTD += $request->input('ITEM_QTD');
                $carrinho->save();
            } else {
                // Crie um novo item no carrinho
                Carrinho::create([
                    'USUARIO_ID' => $usuario->USUARIO_ID,
                    'PRODUTO_ID' => $produto->PRODUTO_ID,
                    'ITEM_QTD' => $request->input('quantidade'),
                ]);
            }

            return redirect()->route('checkout')->with('success', 'Produto adicionado ao carrinho com sucesso');
        } else {
            // O usuário não está autenticado, redirecione para a página de login ou exiba uma mensagem de erro
        }
    }
    public function atualizarCarrinhoItem(Request $request, Carrinho $carrinho)
{
    $usuario = Auth::user();

    if ($usuario && $carrinho->USUARIO_ID === $usuario->USUARIO_ID) {
        $carrinho->ITEM_QTD = $request->input('ITEM_QTD');
        $carrinho->save();
    }

    return redirect()->route('carrinho.index');
}
public function removerDoCarrinho(Carrinho $carrinho)
{
    $usuario = Auth::user();

    if ($usuario && $carrinho->USUARIO_ID === $usuario->USUARIO_ID) {

        $carrinho->update(['ATIVO' => 0]);
    }

    return redirect()->route('carrinho.index');
}



    }



