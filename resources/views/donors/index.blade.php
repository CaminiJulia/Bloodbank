<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Doadores - Bloodbank</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-900">

<header class="bg-red-600 text-white p-4 shadow text-center">
    <h1 class="text-xl font-bold">Bloodbank</h1>
</header>

<main class="max-w-7xl mx-auto p-8">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-red-600">Lista de Doadores</h2>
        <a href="{{ route('donors.create') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
            Novo Doador
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Sanguíneo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Endereço</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($donors as $donor)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $donor->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $donor->bloodType->type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $donor->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $donor->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-4">
                            <a href="{{ route('donors.edit', $donor->id) }}" class="text-red-600 hover:underline">Editar</a>
                            <form action="{{ route('donors.destroy', $donor->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este doador?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhum doador cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Botão Voltar ao Dashboard -->
    <div class="flex justify-end mt-6">
        <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
            Voltar ao Dashboard
        </a>
    </div>

</main>

</body>
</html>
