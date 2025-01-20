<x-client.client-layout>
    {{-- container principal --}}
    <div class="mx-auto w-full max-w-[1400px] px-4">
        <main class="grid grid-cols-1 md:grid-cols-3 gap-8 py-12">
            {{-- Seção da imagem --}}
            <div class="flex justify-center items-center p-4">
                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($produto->image_path) }}"
                     alt="{{ $produto->nome_produto }}"
                     class="w-full h-[500px] object-contain rounded-lg shadow-lg">
            </div>

            {{-- Seção das informações do produto --}}
            <section class="flex flex-col gap-6 p-4">
                <div class="space-y-4">
                    <h1 class="text-4xl font-poppins font-bold text-white">{{ $produto->nome_produto }}</h1>
                    <p class="text-2xl font-poppins text-primaryGradient">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                </div>
                <div class="border-2 border-primaryGradient rounded-lg p-4">
                    <p class="text-white leading-relaxed">{{ $produto->descricao_produto }}</p>
                </div>
            </section>

            {{-- Seção dos botões de ação --}}
            <div class="flex flex-col gap-4 p-4 justify-center">
                <a href="{{ route('checkout', $produto->getKey()) }}"
                   class="btn btn-primary bg-primaryGradient text-lg py-3 rounded-full hover:scale-105 transition-transform text-white">
                    Comprar agora
                </a>
                <form action="{{ route('carrinho.adicionar', $produto->getKey()) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full btn btn-info bg-secondaryGradient text-lg py-3 rounded-full hover:scale-105 transition-transform text-white">
                        Adicionar ao carrinho
                    </button>
                </form>
            </div>

        </main>
    </div>
    
</x-client.client-layout>
