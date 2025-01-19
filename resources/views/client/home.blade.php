<x-client.client-layout>
    {{-- container pai --}}
    <div class="mx-auto w-[90%] max-w-[1700px]">
        <!-- Banner Flutuante -->
        <div
            class="relative w-full h-[250px] bg-gradient-to-r from-rosa via-purple-500 to-blue-500 flex items-center justify-center rounded-lg shadow-lg mt-8">
            <h2 class="text-white text-3xl font-lakki">Bem vindo à nossa loja!</h2>
        </div>

        <!-- Grid de Cards -->
        <section class="py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Card de Produto -->
                @foreach ($produtos as $produto)
                    <div
                        class="bg-containerLogin rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($produto->image_path) }}" alt="Produto"
                            class="w-full h-[200px] object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-white font-poppins">{{$produto->nome_produto}}</h3>
                            <p class="text-sm text-white mt-2 font-poppins ">{{$produto->descricao_produto}}</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-xl font-semibold text-rosa">{{$produto->preco}}</span>
                                <a type="submit" href="{{route('user.produtos.show', $produto->id)}}" class="btn btn-gradient btn-primary">Ver produto</a>

                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </section>
    </div>
</x-client.client-layout>
