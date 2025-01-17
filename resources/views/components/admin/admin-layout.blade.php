<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.header')
</head>

<body class="min-h-screen bg-gradient-to-b from-slate900 via-slate800 to-slate700 bg-fixed">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen bg-slate-900 fixed left-0 top-0 rounded-r-2xl shadow-lg">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-rosa">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V19.5a2.25 2.25 0 002.25 2.25h.75"></path>
                    </svg>
                    <h1 class="text-rosa text-xl font-poppins">Painel Admin</h1>
                </div>
                @include('layouts.admin.sidebar')
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="ml-64 w-full">
            <!-- Navbar Superior -->
            <div class="h-16 bg-slate-900 w-full px-8 flex items-center justify-between shadow-lg mb-6">
                <div class="flex items-center gap-2">
                    <h2 class="text-rosa font-poppins">Dashboard</h2>
                </div>
                @include('layouts.admin.navbar')
            </div>

            <!-- Área do Conteúdo -->
            <div class="p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
