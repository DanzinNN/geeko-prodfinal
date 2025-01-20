<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stripe\Stripe;
use Stripe\Product as StripeProduct;
use Stripe\Price;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_produto' => 'required',
            'descricao_produto' => 'required',
            'preco' => 'required|numeric',
            'qtd_estoque' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image_path'] = $request->file('image')->store('produtos', 'public');
        }

        // Criar produto no Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        $stripeProduct = StripeProduct::create([
            'name' => $data['nome_produto'],
            'description' => $data['descricao_produto'],
        ]);

        $stripePrice = Price::create([
            'unit_amount' => $data['preco'] * 100, // Stripe utiliza centavos
            'currency' => 'usd',
            'product' => $stripeProduct->id,
        ]);

        $data['stripe_product_id'] = $stripeProduct->id;
        $data['stripe_price_id'] = $stripePrice->id;

        Produto::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso no sistema e no Stripe!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('admin.produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_produto' => 'required',
            'descricao_produto' => 'required',
            'preco' => 'required|numeric',
            'qtd_estoque' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($produto->image_path) {
                Storage::disk('public')->delete($produto->image_path);
            }
            $data['image_path'] = $request->file('image')->store('produtos', 'public');
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->image_path) {
            Storage::disk('public')->delete($produto->image_path);
        }

        // Remover produto do Stripe
        if ($produto->stripe_product_id) {
            Stripe::setApiKey(config('services.stripe.secret'));
            $stripeProduct = StripeProduct::retrieve($produto->stripe_product_id);
            $stripeProduct->delete();
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso do sistema e do Stripe!');
    }

    public function checkout(Produto $produto)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Gerar uma sessão de checkout do Stripe
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $produto->stripe_price_id,
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('produtos.index') . '?success=true',
            'cancel_url' => route('produtos.index') . '?cancel=true',
        ]);

        return redirect($session->url);
    }
}

