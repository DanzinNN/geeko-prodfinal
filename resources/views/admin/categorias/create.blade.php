<x-admin.admin-layout>
    <div class="min-h-screen flex justify-center items-start pt-32">
        <div class="w-full sm:max-w-md px-6 py-4 bg-slate800 shadow-md overflow-hidden rounded-lg">
            <div class="card-body">
                <h5 class="text-2xl font-bold text-white mb-4 font-poppins">Cadastrar Categoria</h5>
                <div>
                    <form action="{{route('admin.categorias.store')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nome_categoria" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Nome categoria:</label>
                            <input type="text" name="nome_categoria" id="nome_categoria"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required>
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Descrição categoria:</label>
                            <input type="text" name="descricao" id="descricao"
                                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" required>
                        </div>
                        <button type="submit"
                            class="w-full p-2 bg-rosa text-white rounded-xl hover:bg-rosa/80 transition duration-200 font-poppins">
                            Adicionar categoria
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
