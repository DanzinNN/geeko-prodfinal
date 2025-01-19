<x-client.client-layout>
    <div>
    </div>
    {{-- container pai --}}
    <div class="mx-auto w-full max-w-[1400px]">
        <main class="grid grid-flow-col grid-cols-3 py-8 ">
            <div class="flex justify-center p-3">
                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($produto->image_path) }}" alt="">
            </div>
            <section class="flex flex-col justify-center p-5">
                <div class="gap-5">
                    <h1 class="text-6xl font-poppins">{{ $produto->nome_produto }}</h1>
                    <p class="text-3xl font-poppins">{{ $produto->preco }}</p>
                </div>
                <div class="border-2 border-rosa rounded-lg flex p-2">
                    <p> {{ $produto->descricao_produto }}</p>
                </div>
            </section>
            <div class="flex flex-col gap-5">
                <button class="btn btn-primary btn-gradient ">Comprar agora</button>
                <form action="{{ route('carrinho.adicionar', $produto->getKey()) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-info btn-gradient">Adicionar ao carrinho</button>
                </form>
            </div>
        </main>
    </div>
</x-client.client-layout>