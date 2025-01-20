<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Produto;

class CheckoutController extends Controller
{

    public function checkout(Request $request, Produto $produto)
    {
        // Configure a chave secreta do Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Crie uma nova sessão
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $produto->nome_produto,
                    ],
                    'unit_amount' => $produto->preco * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        // Redirecione o usuário para a nova sessão
        return redirect($session->url);
    }
    public function processarCheckout(Request $request)
    {
        // Configure sua chave secreta do Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Itens do carrinho
        $itensCarrinho = session()->get('carrinho', []); // Ajuste com sua lógica

        if (empty($itensCarrinho)) {
            return redirect()->back()->with('error', 'O carrinho está vazio.');
        }

        // Construa os itens para o Stripe
        $lineItems = [];
        foreach ($itensCarrinho as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $item['produto']->nome,
                    ],
                    'unit_amount' => $item['produto']->preco * 100,
                ],
                'quantity' => $item['quantidade'],
            ];
        }

        // Crie a sessão de checkout
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.sucesso'),
            'cancel_url' => route('checkout.cancelado'),
        ]);

        return redirect($checkoutSession->url);
    }

    public function success()
    {
        return view('client.checkout.success');
    }

    public function cancel()
    {
        return view('client.checkout.cancel');
    }
}
