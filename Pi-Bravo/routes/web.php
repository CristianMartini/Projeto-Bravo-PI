<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutoController::class, 'index'])->name('home');
Route::get('/pesquisar', [ProdutoController::class, 'pesquisar'])->name('pesquisar');
Route::get('/produtos/categoria/{categoria_id}', [ProdutoController::class, 'produtosPorCategoria'])->name('produtos.categoria');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('/carrinho', [CartController::class, 'mostrarCarrinho'])->name('carrinho');
// Rota para Exibir Produtos por Categoria
    Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria');

    Route::post('/carrinho/adicionar/{produtoId}', [CartController::class, 'adicionar'])->name('carrinho.adicionar');

// Rota para atualizar um item no carrinho
    Route::patch('/carrinho/atualizar/{produtoId}', [CartController::class, 'atualizarCarrinho'])->name('carrinho.atualizar');

// Rota para remover um item do carrinho
    Route::delete('/carrinho/remover/{produtoId}', [CartController::class, 'removerDoCarrinho'])->name('carrinho.remover');

    Route::post('/pedido/criar', [PedidoController::class, 'criarPedido'])->name('pedido.criar');
    Route::get('/pedido/listar', [PedidoController::class, 'listarPedidos'])->name('pedido.listar');
    Route::post('/pedido/cancelar/{pedidoId}', [PedidoController::class,'cancelarPedido'])->name('pedido.cancelar');



    Route::post('/carrinho/salvar-escolha-endereco', [CartController::class, 'salvarEscolhaEndereco']);
    Route::post('/endereco/store', [EnderecoController::class, 'store'])->name('endereco.store');
    Route::get('/endereco/create', [EnderecoController::class, 'create'])->name('endereco.create');


    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');

});

require __DIR__ . '/auth.php';
