<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Negado</title>
    @vite(['resources/css/app.css'])
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let countdown = 3;
            const countdownElement = document.getElementById('countdown');

            const interval = setInterval(() => {
                countdownElement.textContent = countdown;
                countdown -= 1;

                if (countdown < 0) {
                    clearInterval(interval);
                    window.location.href = "{{ url('/') }}";
                }
            }, 1000); // Atualiza a cada segundo
        });
    </script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate900 via-slate800 to-slate700 bg-fixed flex items-center justify-center">
    <div class="max-w-2xl p-8 bg-slate900 rounded-2xl shadow-lg text-center">
        <img src="{{ asset('video/banido.gif') }}" alt="Banido" class="mx-auto mb-6 rounded-lg w-96">
        <h1 class="text-4xl font-bold text-rosa mb-4 font-poppins">403 - Acesso Negado</h1>
        <p class="text-white text-lg mb-4 font-poppins">Você não tem permissão para acessar esta página.</p>
        <p class="text-white text-lg mb-6 font-poppins">
            Redirecionando para a página inicial em <span id="countdown" class="font-bold">3</span> segundos...
        </p>
        <a href="{{ url('/') }}"
           class="inline-block px-6 py-3 bg-gradient-to-r from-primaryGradient to-secondaryGradient text-white font-poppins rounded-lg hover:opacity-90 transition-opacity">
            Voltar agora
        </a>
    </div>
</body>
</html>
