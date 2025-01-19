<?php
// filepath: /C:/laragon/www/geeko-prodfinal/app/Http/Controllers/CarrinhoController.php

namespace App\Http\Controllers;

use App\Models\CarrinhoItem;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } 

        $itensCarrinho = CarrinhoItem::where('user_id', Auth::id())
            ->with('produto')
            ->get();

        return view('client.carrinho.index', compact('itensCarrinho'));
    }

    public function adicionar(Request $request, $produto_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        CarrinhoItem::create([
            'user_id' => Auth::id(),
            'produto_id' => $produto_id,
            'quantidade' => 1
        ]);

        return redirect()->route('carrinho.index')
            ->with('success', 'Produto adicionado ao carrinho!');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $item = CarrinhoItem::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $item->delete();

        return redirect()->route('carrinho.index')
            ->with('success', 'Item removido do carrinho!');
    }
}
