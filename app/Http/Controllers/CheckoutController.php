<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
  

    public function success()
    {
        return view('client.checkout.success');
    }

    public function cancel()
    {
        return view('client.checkout.cancel');
    }
}
