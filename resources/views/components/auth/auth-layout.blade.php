<!DOCTYPE html>
<html>

<head>
    @include('layouts.auth.header')
</head>

<body class="h-screen bg-gradient-to-b from-slate900 via-slate800 to-slate700">
    <div class="flex justify-center items-center w-full h-full">
        <div class="drop-shadow-lg rounded-lg bg-loginContainer p-8 max-w-[400px]">
            <div class="flex flex-col justify-center items-center pb-8">
                <img src="{{asset('images/logo-geeko.png')}}" alt="" width="100" height="100">
                <h1 class="font-lakki text-white text-3xl pt-2">@yield('title', 'LOGIN')</h1>
            </div>
            <!-- FORM CONTAINER -->
            {{ $slot }}
        </div>
    </div>
</body>

</html>
