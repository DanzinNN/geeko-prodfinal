<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Roles\HomeController;
use App\Http\Controllers\User\ProdutosController as UserProdutosController;
use Illuminate\Support\Facades\Route;
//ROTAS PADRÕES BREEZE
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
//ROTAS ADMIN
Route::get('categoria', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('categoria/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');
Route::post('categoria',[CategoriaController::class, 'store'])->name('admin.categorias.store');
Route::get('categoria/{categoria}',[CategoriaController::class, 'show'])->name('admin.categorias.show');
Route::get('categoria/{categoria}/edit',[CategoriaController::class, 'edit'])->name('admin.categorias.edit');
Route::put('categoria/{categoria}',[CategoriaController::class, 'update'])->name('admin.categorias.update');
Route::delete('categoria/{categoria}',[CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

Route::get('produto', [ProdutosController::class, 'index'])->name('admin.produtos.index');
Route::get('produto/create',[ProdutosController::class, 'create'])->name('admin.produtos.create');
Route::post('produto', [ProdutosController::class, 'store'])->name('admin.produtos.store');
Route::get('produtdo/{produto}',[ProdutosController::class, 'show'])->name('admin.produtos.show');
Route::get('produto/{produto}/edit',[ProdutosController::class, 'edit'])->name('admin.produtos.edit');
Route::put('produto/{produto}',[ProdutosController::class, 'update'])->name('admin.produtos.update');
Route::delete('produto/{produto}',[ProdutosController::class, 'destroy'])->name('admin.produtos.destroy');
Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.home');
//FIM DAS ROTAS ADMIN
//ROTAS CLIENT
Route::get('/home', [UserProdutosController::class, 'index'])->name('client.home');
Route::resource('produtos', ProdutosController::class);
Route::get('produtosUser', [UserProdutosController::class,  'index'])->name('user.produtos.index');
Route::get('produtosUser/{produto}', [UserProdutosController::class,  'show'])->name('user.produtos.show');

Route::prefix('carrinho')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/adicionar/{produto_id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
    Route::delete('/remover/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');
    Route::patch('/atualizar/{id}', [CarrinhoController::class, 'update'])->name('carrinho.update');
    Route::post('/aumentar/{id}', [CarrinhoController::class, 'aumentarQuantidade'])->name('carrinho.aumentar');
    Route::post('/diminuir/{id}', [CarrinhoController::class, 'diminuirQuantidade'])->name('carrinho.diminuir');

});

Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::get('/checkout/{produto}', [CheckoutController::class, 'checkout'])->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'processarCheckout'])->name('checkout.processar');

//FIM DAS ROTAS CLIENT

