<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doações</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

<header class="bg-green-600 text-white p-4 shadow text-center">
    <h1 class="text-xl font-bold">Bloodbank</h1>
</header>

<main class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Botão Nova Doação -->
        <div class="flex justify-end">
    <a href="{{ route('donations.create') }}" class="mb-4 inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
        Nova Doação
    </a>
</div>


        <!-- Mensagem de Sucesso -->
        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <!-- Tabela de Doações -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Doador</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Receptor</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Data</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Volume (ml)</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($donations as $donation)
                        <tr>
                            <td class="px-4 py-2">{{ $donation->donor->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $donation->recipient->name ?? '—' }}</td>
                            <td class="px-4 py-2">{{ $donation->date }}</td>
                            <td class="px-4 py-2">{{ number_format($donation->volume_ml, 0, ',', '.') }} ml</td> <!-- Exibe o volume doado -->
                            <td class="px-4 py-2 flex gap-4">
                                <a href="{{ route('donations.edit', $donation->id) }}" class="text-blue-600 hover:underline">Editar</a>

                                <form method="POST" action="{{ route('donations.destroy', $donation->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('Deseja excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Caso Não Haja Doações -->
                    @if ($donations->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Nenhuma doação registrada.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
<div class="flex justify-end mt-6">
        <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
            Voltar ao Dashboard
        </a>
    </div>
    </div>
</main>

</body>
</html>
