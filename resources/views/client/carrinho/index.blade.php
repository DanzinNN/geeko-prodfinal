<x-client.client-layout>
<div class="container mx-auto px-4 py-8 text-white font-poppins">
    <h1 class="text-3xl font-bold mb-8">Carrinho de Compras</h1>

    @if($itensCarrinho->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Lista de Produtos -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($itensCarrinho as $item)
                    <div class="bg-gray-800 rounded-lg p-4 flex flex-col md:flex-row items-center justify-between">
                        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($item->produto->image_path) }}"
                                 alt="{{ $item->produto->nome }}"
                                 class="w-24 h-24 object-cover rounded-lg">
                            <div>
                                <h3 class="text-xl font-semibold text-white">{{ $item->produto->nome }}</h3>
                                <p class="text-gray-400">{{ $item->produto->descricao }}</p>
                                <p class="text-pink-500 font-bold">R$ {{ number_format($item->produto->preco, 2, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 mt-4 md:mt-0">
                            <div class="flex items-center space-x-2">
                                <button class="bg-gray-700 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition">-</button>
                                <span class="text-xl px-2">{{ $item->quantidade }}</span>
                                <button class="bg-gray-700 text-white px-3 py-1 rounded-lg hover:bg-gray-600 transition">+</button>
                            </div>

                            <form action="{{ route('carrinho.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-pink-500 hover:text-pink-400 transition" onclick=" return confirm('Tem certeza que deseja remover este item do carrinho?')"
                                arial-label = "Excluir Produto">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Resumo do Pedido -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 rounded-lg p-6 space-y-6">
                    <h2 class="text-2xl font-bold text-white">Resumo do Pedido</h2>

                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <span>R$ {{ number_format($itensCarrinho->sum(function($item) {
                                return $item->produto->preco * $item->quantidade;
                            }), 2, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Frete:</span>
                            <span>Grátis</span>
                        </div>
                        <div class="border-t border-gray-700 pt-2 mt-2">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total:</span>
                                <span class="text-pink-500">R$ {{ number_format($itensCarrinho->sum(function($item) {
                                    return $item->produto->preco * $item->quantidade;
                                }), 2, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <button class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition font-bold">
                        Finalizar Compra
                    </button>

                    <a href="{{ route('client.home') }}" class="block text-center text-gray-400 hover:text-white transition">
                        Continuar Comprando
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <h2 class="text-2xl font-bold mb-4 text-white">Seu carrinho está vazio</h2>
            <p class="text-gray-400 mb-8">Adicione alguns produtos para começar suas compras!</p>
            <a href="{{ route('client.home') }}"
               class="inline-block bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition">
                Continuar Comprando
            </a>
        </div>
    @endif
</div>
</x-client.client-layout>
