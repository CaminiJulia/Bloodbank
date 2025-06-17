<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Bloodbank</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <header class="bg-red-600 text-white p-4 text-center">
        <h1 class="text-2xl font-bold">Bloodbank - Dashboard</h1>
    </header>

    <main class="p-6 max-w-7xl mx-auto">

        {{-- Contadores --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-gray-600 text-sm">Doadores</h3>
                <p class="text-3xl font-bold text-red-600">{{ $donors }}</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-gray-600 text-sm">Receptores</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $recipients }}</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-gray-600 text-sm">Doações</h3>
                <p class="text-3xl font-bold text-green-600">{{ $donations }}</p>
            </div>
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-gray-600 text-sm">Tipos Sanguíneos</h3>
                <p class="text-3xl font-bold text-purple-600">{{ $bloodTypes }}</p>
            </div>
        </div>

        {{-- Botões de Ação --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Doadores -->
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-lg font-semibold mb-4 text-red-600">Doadores</h3>
                <a href="{{ route('donors.create') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mb-2 inline-block w-full">Adicionar</a>
                <a href="{{ route('donors.index') }}" class="bg-red-100 hover:bg-red-200 text-red-700 font-bold py-2 px-4 rounded inline-block w-full">Ver Todos</a>
            </div>

            <!-- Receptores -->
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-lg font-semibold mb-4 text-blue-600">Receptores</h3>
                <a href="{{ route('recipients.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2 inline-block w-full">Adicionar</a>
                <a href="{{ route('recipients.index') }}" class="bg-blue-100 hover:bg-blue-200 text-blue-700 font-bold py-2 px-4 rounded inline-block w-full">Ver Todos</a>
            </div>

            <!-- Doações -->
            <div class="bg-white shadow rounded p-6 text-center">
                <h3 class="text-lg font-semibold mb-4 text-green-600">Doações</h3>
                <a href="{{ route('donations.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-2 inline-block w-full">Registrar</a>
                <a href="{{ route('donations.index') }}" class="bg-green-100 hover:bg-green-200 text-green-700 font-bold py-2 px-4 rounded inline-block w-full">Ver Todas</a>
            </div>
        </div>

    </main>

</body>
</html>
