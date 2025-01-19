<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ProdutosController as UserProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [UserProdutosController::class, 'index']);;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin', function () {
    return view('admin.teste');
});

require __DIR__.'/auth.php';


//ROTAS ADMIN CATEGORIA
Route::get('categoria', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('categoria/create', [CategoriaController::class, 'create'])->name('admin.categorias.create');
Route::post('categoria',[CategoriaController::class, 'store'])->name('admin.categorias.store');
Route::get('categoria/{categoria}',[CategoriaController::class, 'show'])->name('admin.categorias.show');
Route::get('categoria/{categoria}/edit',[CategoriaController::class, 'edit'])->name('admin.categorias.edit');
Route::put('categoria/{categoria}',[CategoriaController::class, 'update'])->name('admin.categorias.update');
Route::delete('categoria/{categoria}',[CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

//ROTAS ADMIN PRODUTO
Route::get('produto', [ProdutosController::class, 'index'])->name('admin.produtos.index');
Route::get('produto/create',[ProdutosController::class, 'create'])->name('admin.produtos.create');
Route::post('produto', [ProdutosController::class, 'store'])->name('admin.produtos.store');
Route::get('produtdo/{produto}',[ProdutosController::class, 'show'])->name('admin.produtos.show');
Route::get('produto/{produto}/edit',[ProdutosController::class, 'edit'])->name('admin.produtos.edit');
Route::put('produto/{produto}',[ProdutosController::class, 'update'])->name('admin.produtos.update');
Route::delete('produto/{produto}',[ProdutosController::class, 'destroy'])->name('admin.produtos.destroy');

Route::resource('produtos', ProdutosController::class);
Route::get('produtosUser', [UserProdutosController::class,  'index'])->name('user.produtos.index');
Route::get('produtosUser/{produto}', [UserProdutosController::class,  'show'])->name('user.produtos.show');

Route::get('/produtoId', function () {
    return view('client.produto.index');
});



Route::prefix('carrinho')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/adicionar/{produto_id}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
    Route::delete('/remover/{id}', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');
    Route::patch('/atualizar/{id}', [CarrinhoController::class, 'update'])->name('carrinho.update');
});
