<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.client.header')
</head>

<body class="min-h-screen bg-gradient-to-b from-slate900 via-slate800 to-slate700 bg-fixed">
    <!-- Navegação -->

    @include('layouts.client.navbar')
    <div class="w-full h-[50px] bg-slate-900 flex items-center px-8 gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <h1 class="text-white font-poppins">Categorias</h1>
    </div>

    <!-- Contêiner Pai -->
    <div class="mx-auto w-[90%] max-w-[1700px]">
        {{ $slot }}
    </div>
</body>

</html>
