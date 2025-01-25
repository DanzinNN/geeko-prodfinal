@extends('laratrust::panel.layout')

@section('title', 'Atribuição de Funções')

@section('content')
  <div class="w-full px-4 lg:px-8 py-4">
    <div class="bg-slate700 rounded-lg shadow-lg">
      <div class="p-4 flex flex-col border-b border-gray-700">
        <h2 class="text-xl font-poppins text-white mb-4">Atribuição de Funções</h2>

        <div
          x-data="{ model: @if($modelKey) '{{$modelKey}}' @else 'initial' @endif }"
          x-init="$watch('model', value => value != 'initial' ? window.location = `?model=${value}` : '')"
        >
          <span class="text-gray-300 font-poppins text-sm mb-2 block">Selecione o modelo de usuário para atribuir funções/permissões</span>
          <label class="block w-3/12">
            <select class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200" x-model="model">
              <option value="initial" disabled selected>Selecione um modelo de usuário</option>
              @foreach ($models as $model)
                <option value="{{$model}}">{{ucwords($model)}}</option>
              @endforeach
            </select>
          </label>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-slate800 text-white">
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">ID</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nome</th>
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nº de Funções</th>
              @if(config('laratrust.panel.assign_permissions_to_user'))
                <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Nº de Permissões</th>
              @endif
              <th class="px-6 py-3 text-left text-xs font-poppins uppercase">Ação</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700">
            @foreach ($users as $user)
              <tr class="text-gray-300 hover:bg-slate800/50 transition duration-200 font-poppins">
                <td class="px-6 py-4 whitespace-nowrap">{{$user->getKey()}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{$user->name ?? 'O modelo não possui um atributo `name`'}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{$user->roles_count}}</td>
                @if(config('laratrust.panel.assign_permissions_to_user'))
                  <td class="px-6 py-4 whitespace-nowrap">{{$user->permissions_count}}</td>
                @endif
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex gap-3">
                    <a href="{{route('laratrust.roles-assignment.edit', ['roles_assignment' => $user->getKey(), 'model' => $modelKey])}}"
                      class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#22c55e] to-[#16a34a] rounded-lg hover:opacity-90 transition duration-200">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      @if ($modelKey)
        <div class="p-4 border-t border-gray-700">
          {{ $users->appends(['model' => $modelKey])->links('laratrust::panel.pagination') }}
        </div>
      @endif
    </div>
  </div>
@endsection
