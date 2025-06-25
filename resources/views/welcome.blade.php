<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodbank - Bem-vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.15); opacity: 0.75; }
        }
        .glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-100 via-white to-red-50 min-h-screen flex items-center justify-center text-gray-800 font-sans">
    <div class="glass rounded-3xl shadow-2xl p-10 max-w-xl w-full text-center animate-fade-in">
        <div class="mb-6">
            <div class="text-red-600 text-6xl animate-[pulse_2s_infinite]">❤️</div>
            <h1 class="text-4xl font-bold text-red-700 mt-2 tracking-wide">Bloodbank</h1>
            <p class="mt-3 text-gray-600 text-lg">Doe sangue. Compartilhe vida.</p>
        </div>

        <div class="flex justify-center space-x-4 mt-8">
            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-red-600 text-white rounded-xl shadow hover:bg-red-700 hover:scale-105 transition transform duration-200 font-medium">
                Entrar
            </a>
            <a href="{{ route('register') }}"
               class="px-6 py-3 bg-white text-red-600 border border-red-600 rounded-xl shadow hover:bg-red-100 hover:scale-105 transition transform duration-200 font-medium">
                Cadastre-se
            </a>
        </div>

        <div class="mt-10 text-sm text-gray-400">
            &copy; {{ date('Y') }} Bloodbank. Todos os direitos reservados.
        </div>
    </div>
</body>
</html>
