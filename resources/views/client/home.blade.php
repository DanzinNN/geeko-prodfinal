<x-client.client-layout>
    {{-- container pai --}}
    <div class="mx-auto w-[90%] max-w-[1700px]">
        <!-- Banner Flutuante -->
        <div
            class="relative w-full h-[250px] flex items-center justify-center rounded-lg shadow-lg mt-14">
            <img src="{{asset('images/banner-gekko.png')}}" alt="" class="rounded-lg w-full">
        </div>

        <!-- Grid de Cards -->
        <section class="py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Card de Produto -->
                @foreach ($produtos as $produto)
                    <div class="bg-slate700 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-[1.02] hover:shadow-xl border border-slate800">
                        <div class="relative group">
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($produto->image_path) }}"
                                 alt="{{$produto->nome_produto}}"
                                 class="w-full h-[250px] object-cover transition-transform duration-300 group-hover:brightness-90">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <div class="p-5 space-y-3">
                            <h3 class="text-xl font-bold text-white font-poppins line-clamp-1">{{$produto->nome_produto}}</h3>
                            <p class="text-sm text-gray-300 font-poppins line-clamp-2">{{$produto->descricao_produto}}</p>

                            <div class="flex items-center justify-between pt-2">
                                <span class="text-2xl font-bold text-rosa">R$ {{$produto->preco}}</span>
                                <a href="{{route('user.produtos.show', $produto->id)}}"
                                   class="px-4 py-2 rounded-lg bg-rosa hover:bg-pink500 text-white font-medium hover:shadow-lg transition-all duration-300">
                                    Ver produto
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-client.client-layout>
