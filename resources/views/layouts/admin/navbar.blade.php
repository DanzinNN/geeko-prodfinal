<div class="flex items-center gap-4">
    <!-- Busca -->
    <input type="text"
        class="p-2 w-[300px] rounded-xl border-2 border-rosa bg-transparent text-white placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
        placeholder="Buscar...">

    <!-- Notificações -->
    <div class="relative">
        <button class="text-rosa hover:text-rosa/80 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
        </button>
    </div>

    <!-- Perfil do Usuário -->
    <div class="relative" x-data="{ isOpen: false }">
        <button @click="isOpen = !isOpen" class="flex items-center gap-2 text-rosa hover:text-rosa/80 transition">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Avatar" class="w-8 h-8 rounded-xl">
            <span class="font-poppins">{{ Auth::user()->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 mt-2 w-48 bg-slate-800 rounded-xl shadow-lg py-1 border border-rosa">
            <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-rosa/20 transition">Perfil</a>
            <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-rosa/20 transition">Configurações</a>
            <div class="border-t border-rosa/30"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-rosa/20 transition">
                    Sair
                </button>
            </form>
        </div>
    </div>
</div>
