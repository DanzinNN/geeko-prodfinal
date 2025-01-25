@extends('laratrust::panel.layout')

@section('title', "Detalhes da Função")

@section('content')
  <div class="w-full px-4 lg:px-8 py-4">
    <div class="bg-slate700 rounded-lg shadow-lg">
      <div class="p-4 flex flex-col border-b border-gray-700">
        <h2 class="text-xl font-poppins text-white mb-4">Detalhes da Função</h2>

        <div class="space-y-4">
          <div class="flex flex-col">
            <span class="text-sm font-medium text-gray-300 font-poppins">Nome/Código:</span>
            <span class="text-white font-poppins">{{$role->name}}</span>
          </div>

          <div class="flex flex-col">
            <span class="text-sm font-medium text-gray-300 font-poppins">Nome de Exibição:</span>
            <span class="text-white font-poppins">{{$role->display_name}}</span>
          </div>

          <div class="flex flex-col">
            <span class="text-sm font-medium text-gray-300 font-poppins">Descrição:</span>
            <span class="text-white font-poppins">{{$role->description}}</span>
          </div>

          <div class="flex flex-col">
            <span class="text-sm font-medium text-gray-300 font-poppins mb-2">Permissões:</span>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              @foreach ($role->permissions as $permission)
                <span class="text-white font-poppins bg-slate800 px-3 py-2 rounded-lg">
                  {{$permission->display_name ?? $permission->name}}
                </span>
              @endforeach
            </div>
          </div>
        </div>

        <div class="flex justify-end mt-6">
          <a href="{{route('laratrust.roles.index')}}"
            class="bg-gradient-to-r from-primaryGradient to-secondaryGradient text-white px-4 py-2 rounded-lg hover:opacity-90 transition duration-200 font-poppins">
            Voltar
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
