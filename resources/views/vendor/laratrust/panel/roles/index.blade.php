@extends('laratrust::panel.layout')

@section('title', 'Funções')

@section('content')
  <div class="w-full px-4 lg:px-8 py-4">
    <div class="bg-slate700 rounded-lg shadow-lg">
      <div class="p-4 flex justify-between items-center border-b border-gray-700">
        <h2 class="text-xl font-poppins text-white">Funções</h2>
        <a href="{{route('laratrust.roles.create')}}">
          <button class="bg-gradient-to-r from-primaryGradient to-secondaryGradient text-white px-4 py-2 rounded-lg hover:opacity-90 transition duration-200 font-poppins">
            Nova Função
          </button>
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-slate800 text-white">
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">ID</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nome de Exibição</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nome/Código</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nº de Permissões</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Ação</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700">
            @foreach ($roles as $role)
            <tr class="text-gray-300 hover:bg-slate800/50 transition duration-200 font-poppins">
              <td class="px-6 py-4 whitespace-nowrap">{{$role->getKey()}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$role->display_name}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$role->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$role->permissions_count}}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex gap-3">
                  @if (\Laratrust\Helper::roleIsEditable($role))
                    <a href="{{route('laratrust.roles.edit', $role->getKey())}}">
                      <button class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#22c55e] to-[#16a34a] rounded-lg hover:opacity-90 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                      </button>
                    </a>
                  @else
                    <a href="{{route('laratrust.roles.show', $role->getKey())}}">
                      <button class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-primaryGradient to-secondaryGradient rounded-lg hover:opacity-90 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                      </button>
                    </a>
                  @endif

                  @if(\Laratrust\Helper::roleIsDeletable($role))
                    <form action="{{route('laratrust.roles.destroy', $role->getKey())}}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este registro?');">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#ef4444] to-[#dc2626] rounded-lg hover:opacity-90 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                      </button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="p-4 border-t border-gray-700">
        {{ $roles->links('laratrust::panel.pagination') }}
      </div>
    </div>
  </div>
@endsection
