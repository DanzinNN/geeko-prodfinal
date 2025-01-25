@extends('laratrust::panel.layout')

@section('title', "Edit {$modelKey}")

@section('content')
  <div>
  </div>
  <div class="min-h-screen flex justify-center items-start pt-32">
    <div class="w-full sm:max-w-md px-6 py-4 bg-slate800 shadow-md overflow-hidden rounded-lg">
        <div class="card-body">
            <h5 class="text-2xl font-bold text-white mb-4 font-poppins">Editar Permissões - {{$user->name}}</h5>
            <div>
                <form method="POST"
                      action="{{route('laratrust.roles-assignment.update', ['roles_assignment' => $user->getKey(), 'model' => $modelKey])}}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Nome:</label>
                        <input
                            class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
                            name="name"
                            value="{{$user->name ?? 'The model doesn\'t have a `name` attribute'}}"
                            readonly
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Funções:</label>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach ($roles as $role)
                                <label class="inline-flex items-center">
                                    <input type="checkbox"
                                        class="form-checkbox text-rosa border-rosa rounded focus:ring-rosa"
                                        name="roles[]"
                                        value="{{$role->getKey()}}"
                                        {!! $role->assigned ? 'checked' : '' !!}
                                        {!! $role->assigned && !$role->isRemovable ? 'disabled' : '' !!}
                                    >
                                    <span class="ml-2 text-gray-300 text-sm font-poppins">
                                        {{$role->display_name ?? $role->name}}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    @if ($permissions)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2 font-poppins">Permissões:</label>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($permissions as $permission)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox"
                                            class="form-checkbox text-rosa border-rosa rounded focus:ring-rosa"
                                            name="permissions[]"
                                            value="{{$permission->getKey()}}"
                                            {!! $permission->assigned ? 'checked' : '' !!}
                                        >
                                        <span class="ml-2 text-gray-300 text-sm font-poppins">
                                            {{$permission->display_name ?? $permission->name}}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="flex justify-end space-x-4">
                        <a href="{{route("laratrust.roles-assignment.index", ['model' => $modelKey])}}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition duration-200 font-poppins">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-rosa text-white rounded-xl hover:bg-rosa/80 transition duration-200 font-poppins">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
