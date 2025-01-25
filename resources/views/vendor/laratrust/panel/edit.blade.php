@extends('laratrust::panel.layout')

@section('title', $model ? "Edit {$type}" : "New {$type}")

@section('content')
  <div class="min-h-screen flex justify-center items-start pt-32">
    <div class="w-full sm:max-w-md px-6 py-4 bg-slate800 shadow-md overflow-hidden rounded-lg">
      <div class="card-body">
        <h5 class="text-2xl font-bold text-white mb-4 font-poppins">{{ $model ? "Editar {$type}" : "Novo {$type}" }}</h5>
        <form
          x-data="laratrustForm()"
          x-init="{!! $model ? '' : '$watch(\'displayName\', value => onChangeDisplayName(value))'!!}"
          method="POST"
          action="{{$model ? route("laratrust.{$type}s.update", $model->getKey()) : route("laratrust.{$type}s.store")}}"
        >
          @csrf
          @if ($model)
            @method('PUT')
          @endif

          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Nome/Código</label>
            <input
              class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200 @error('name') border-red-500 @enderror"
              name="name"
              placeholder="this-will-be-the-code-name"
              :value="name"
              readonly
              autocomplete="off"
            >
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message}} </div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Nome de Exibição</label>
            <input
              class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
              name="display_name"
              placeholder="Edit user profile"
              x-model="displayName"
              autocomplete="off"
            >
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Descrição</label>
            <textarea
              class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
              rows="3"
              name="description"
              placeholder="Some description for the {{$type}}"
            >{{ $model->description ?? old('description') }}</textarea>
          </div>

          @if($type == 'role')
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Permissões</label>
              <div class="flex flex-wrap justify-start">
                @foreach ($permissions as $permission)
                  <label class="inline-flex items-center mr-6 my-2 text-sm text-white font-poppins" style="flex: 1 0 20%;">
                    <input
                      type="checkbox"
                      class="form-checkbox h-4 w-4 border-rosa text-rosa focus:ring-rosa"
                      name="permissions[]"
                      value="{{$permission->getKey()}}"
                      {!! $permission->assigned ? 'checked' : '' !!}
                    >
                    <span class="ml-2">{{$permission->display_name ?? $permission->name}}</span>
                  </label>
                @endforeach
              </div>
            </div>
          @endif

          <div class="flex justify-end gap-4">
            <a
              href="{{route("laratrust.{$type}s.index")}}"
              class="px-4 py-2 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition duration-200 font-poppins"
            >
              Cancelar
            </a>
            <button
              class="px-4 py-2 bg-rosa text-white rounded-xl hover:bg-rosa/80 transition duration-200 font-poppins"
              type="submit"
            >
              Salvar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    window.laratrustForm =  function() {
      return {
        displayName: '{{ $model->display_name ?? old('display_name') }}',
        name: '{{ $model->name ?? old('name') }}',
        toKebabCase(str) {
          return str &&
            str
              .match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g)
              .map(x => x.toLowerCase())
              .join('-')
              .trim();
        },
        onChangeDisplayName(value) {
          this.name = this.toKebabCase(value);
        }
      }
    }
  </script>
@endsection
