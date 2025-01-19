<x-admin.admin-layout>
    <div class="min-h-screen flex justify-center items-start pt-32">
        <div class="w-full sm:max-w-md px-6 py-4 bg-slate800 shadow-md overflow-hidden rounded-lg">
            <div class="card-body">
                <h5 class="text-2xl font-bold text-white mb-4 font-poppins">Editar Produto</h5>
                <div>
                    <form action="{{route('admin.produtos.update', $produto->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Imagem Atual:</label>
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($produto->image_path)}}" alt="{{$produto->nome_produto}}" alt="Imagem do Produto" class="w-32 h-32 object-cover rounded-lg mb-2">
                            <input type="file" name="image_path" id="image_path" accept="image/*"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" value="{{$produto->image_path}}">
                        </div>

                        <div class="mb-4">
                            <label for="nome_produto" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Nome do Produto:</label>
                            <input type="text" name="nome_produto" id="nome_produto"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required value="{{$produto->nome_produto}}">
                        </div>

                        <div class="mb-4">
                            <label for="descricao_produto" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Descrição:</label>
                            <input type="text" name="descricao_produto" id="descricao_produto"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required value="{{$produto->descricao_produto}}">
                        </div>

                        <div class="mb-4">
                            <label for="preco" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Preço:</label>
                            <input type="number" step="0.01" name="preco" id="preco"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required value="{{$produto->preco}}">
                        </div>

                        <div class="mb-4">
                            <label for="qtd_estoque" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Quantidade em Estoque:</label>
                            <input type="number" name="qtd_estoque" id="qtd_estoque"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required value="{{$produto->qtd_estoque}}">
                        </div>

                        <div class="mb-4">
                            <label for="id_categoria" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Categoria:</label>
                            <select name="id_categoria" id="id_categoria"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required">	 
                                @foreach ($categorias as $categoria )
                                <option value="{{$categoria->id}}" @if($produto->id_categoria == $categoria->id) selected @endif>{{$categoria->nome_categoria}}</option>
                                    
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="w-full p-2 bg-rosa text-white rounded-xl hover:bg-rosa/80 transition duration-200 font-poppins">
                            Atualizar Produto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.admin-layout>