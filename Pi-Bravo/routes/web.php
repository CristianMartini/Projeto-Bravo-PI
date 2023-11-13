<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProdutoController::class,'index']);
Route::get('/pesquisar', [ProdutoController::class, 'pesquisar'])->name('pesquisar');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('/categorias', [CategoriaController::class, 'index']);
    // Rota da Página Inicial

// Rota para adicionar um item ao carrinho
Route::post('/carrinho/adicionar/{produtoId}', [CartController::class, 'adicionar'])->name('carrinho.adicionar');

// Rota para remover um item do carrinho
Route::delete('/carrinho/remover/{itemId}', [CartController::class, 'remover'])->name('carrinho.remover');
Route::get('/carrinho', [CartController::class, 'mostrarCarrinho'])->name('carrinho.show');
// Rota para Exibir Produtos por Categoria
Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria');
// Rota para mostrar todos os pedidos de um usuário
Route::get('/pedidos', [PedidoController::class, 'mostrarPedido'])->name('pedidos.mostrar');

// Rota para adicionar um item ao pedido
Route::post('/pedido/{pedidoId}/adicionar/{produtoId}', [PedidoController::class, 'adicionarAoPedido'])->name('pedido.adicionar');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/pedido/finalizar', [PedidoController::class, 'finalizar'])->name('pedido.finalizar');
});
Route::get('/meus-pedidos', [PedidoController::class, 'listarPedidos'])->name('pedidos.listar');
require __DIR__.'/auth.php';
