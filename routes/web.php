<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('client.home');
});

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
Route::get('/adminCategoriasIndex', function () {
    return view('admin.categorias.index');
});
Route::get('/adminCategoriasCreate', function () {
    return view('admin.categorias.create');
});
Route::get('/adminProdutosIndex', function () {
    return view('admin.produtos.index');
});
Route::get('/adminProdutosCreate', function () {
    return view('admin.produtos.create');
});
Route::get('/adminProdutosEdit', function () {
    return view('admin.produtos.edit');
});

require __DIR__.'/auth.php';
