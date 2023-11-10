<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CarrinhoItemController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoItemController;
use App\Http\Controllers\PedidoStatusController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoEstoqueController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProdutoController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produto.show');

    Route::get('/categorias', [CategoriaController::class, 'index']);

    Route::post('/carrinho/{produto}', [CarrinhoController::class, 'adicionarAoCarrinho'])->name('carrinho.store');
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('checkout');

    Route::get('/carrinho-itens', [CarrinhoItemController::class, 'index'])->name('carrinho-itens.index'); // CarrinhoItem
    Route::get('/carrinho-itens/{carrinhoItem}', [CarrinhoItemController::class, 'show'])->name('carrinho-itens.show');


    Route::get('/enderecos', [EnderecoController::class, 'index'])->name('endereco.index');
    Route::get('/enderecos/create', [EnderecoController::class, 'create'])->name('endereco.create');
    Route::post('/enderecos', [EnderecoController::class, 'store'])->name('endereco.store');

    Route::get('/produto_estoque', [ProdutoEstoqueController::class, 'index'])->name('produto_estoque.index');
    Route::get('/produto_estoque/{produtoEstoque}', [ProdutoEstoqueController::class, 'show'])->name('produto_estoque.show');

    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');

    Route::get('/pedidoItens', [PedidoItemController::class, 'index'])->name('pedidoItens.index');

    Route::get('/pedidoStatus', [PedidoStatusController::class, 'index'])->name('pedidoStatus.index');
 // PedidoItem
    Route::get('/pedido-itens/{pedidoItem}', [PedidoItemController::class, 'show'])->name('pedido-itens.show');

});

require __DIR__ . '/auth.php';
