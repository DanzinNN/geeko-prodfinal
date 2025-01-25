@extends('laratrust::panel.layout')

@section('title', 'Permissões')

@section('content')
  <div class="w-full px-4 lg:px-8 py-4">
    <div class="bg-slate700 rounded-lg shadow-lg">
      <div class="p-4 flex justify-between items-center border-b border-gray-700">
        <h2 class="text-xl font-poppins text-white">Permissões</h2>
        @if (config('laratrust.panel.create_permissions'))
        <a href="{{route('laratrust.permissions.create')}}">
          <button class="bg-gradient-to-r from-primaryGradient to-secondaryGradient text-white px-4 py-2 rounded-lg hover:opacity-90 transition duration-200 font-poppins">
            Nova Permissão
          </button>
        </a>
        @endif
      </div>

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-slate800 text-white">
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">ID</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nome/Código</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nome de Exibição</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Descrição</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Ação</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700">
            @foreach ($permissions as $permission)
            <tr class="text-gray-300 hover:bg-slate800/50 transition duration-200 font-poppins">
              <td class="px-6 py-4 whitespace-nowrap">{{$permission->getKey()}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$permission->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$permission->display_name}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$permission->description}}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex gap-3">
                  <a href="{{route('laratrust.permissions.edit', $permission->getKey())}}">
                    <button class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#22c55e] to-[#16a34a] rounded-lg hover:opacity-90 transition duration-200">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                    </button>
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="p-4 border-t border-gray-700">
        {{ $permissions->links('laratrust::panel.pagination') }}
      </div>
    </div>
  </div>
@endsection
