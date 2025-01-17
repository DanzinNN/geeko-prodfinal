<x-auth.auth-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <input type="text" name="email"
            class="p-2 w-full rounded-md border-2 border-pink500 bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-pink500 focus:border-pink500 transition duration-200 placeholder:font-poppins"
            placeholder="Email">
        <input type="password" name="password"
            class="p-2 w-full rounded-md border-2 border-pink500 bg-transparent text-white focus:outline-none focus:ring-2 focus:ring-pink500 focus:border-pink500 transition duration-200 placeholder:font-poppins"
            placeholder="Senha">
        <button class="bg-pink500 w-full rounded-md p-2 text-white font-poppins font-extrabold"
            type="submit">LOGIN</button>
    </form>
    <div class="pt-4">
        <div class="bg-gradient-to-r from-primaryGradient to-secondaryGradient h-0.5"></div>
        <p class="font-poppins text-white pt-2">Não tem uma conta ainda? <a href="{{ route('register') }}"
                class="hover:text-pink500">Cadastre-se</a> </p>
    </div>
</x-auth.auth-layout>
