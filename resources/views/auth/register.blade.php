<x-auth.auth-layout>
    @section('title', 'CADASTRO')

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <input type="text"
            id="name"
            name="name"
            :value="old('name')"
            class="p-2 w-full rounded-md border-2 border-pink500 bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-pink500 focus:border-pink500 transition duration-200 placeholder:font-poppins"
            placeholder="Nome"
            required
            autofocus
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <input type="email"
            id="email"
            name="email"
            :value="old('email')"
            class="p-2 w-full rounded-md border-2 border-pink500 bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-pink500 focus:border-pink500 transition duration-200 placeholder:font-poppins"
            placeholder="Email"
            required
        />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <input type="password"
            id="password"
            name="password"
            class="p-2 w-full rounded-md border-2 border-pink500 bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-pink500 focus:border-pink500 transition duration-200 placeholder:font-poppins"
            placeholder="Senha"
            required
        />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <input type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="p-2 w-full rounded-md border-2 border-pink500 bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-pink500 focus:border-pink500 transition duration-200 placeholder:font-poppins"
            placeholder="Confirmar Senha"
            required
        />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

       <button type="submit" class="bg-pink500 w-full rounded-md p-2 text-white font-poppins font-extrabold hover:bg-pink600 transition duration-200">
            CADASTRAR
        </button>
    </form>

    <div class="pt-4">
        <div class="bg-gradient-to-r from-primaryGradient to-secondaryGradient h-0.5"></div>
        <p class="font-poppins text-white pt-2">
            Já tem uma conta?
            <a href="{{ route('login') }}" class="hover:text-pink500">
                Faça login
            </a>
        </p>
    </div>
</x-auth.auth-layout>
