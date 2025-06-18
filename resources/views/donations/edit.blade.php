<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Doação</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-900">

<header class="bg-green-600 text-white p-4 shadow text-center">
    <h1 class="text-xl font-bold">Bloodbank</h1>
</header>

<main class="py-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow-md">

        <h2 class="text-2xl font-semibold text-green-600 mb-6 text-center">Editar Doação</h2>

        <form method="POST" action="{{ route('donations.update', $donation->id) }}">
            @csrf
            @method('PUT')

            <!-- Doador -->
            <div class="mb-4">
                <label for="donor_id" class="block mb-1 font-medium text-sm text-gray-700">Doador</label>
                <select name="donor_id" id="donor_id" class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    @foreach ($donors as $donor)
                        <option value="{{ $donor->id }}" {{ $donation->donor_id == $donor->id ? 'selected' : '' }}>
                            {{ $donor->user->name ?? 'Doador #'.$donor->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Receptor (opcional) -->
            <div class="mb-4">
                <label for="recipient_id" class="block mb-1 font-medium text-sm text-gray-700">Receptor (opcional)</label>
                <select name="recipient_id" id="recipient_id" class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">-- Nenhum --</option>
                    @foreach ($recipients as $recipient)
                        <option value="{{ $recipient->id }}" {{ $donation->recipient_id == $recipient->id ? 'selected' : '' }}>
                            {{ $recipient->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Data da Doação -->
            <div class="mb-4">
                <label for="date" class="block mb-1 font-medium text-sm text-gray-700">Data da Doação</label>
                <input type="date" name="date" id="date" value="{{ $donation->date }}" class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-500" required />
            </div>

            <!-- Volume (ml) -->
            <div class="mb-4">
                <label for="volume_ml" class="block mb-1 font-medium text-sm text-gray-700">Volume (ml)</label>
                <select name="volume_ml" id="volume_ml" class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="250" {{ $donation->volume_ml == 250 ? 'selected' : '' }}>250 ml</option>
                    <option value="500" {{ $donation->volume_ml == 500 ? 'selected' : '' }}>500 ml</option>
                    <option value="1000" {{ $donation->volume_ml == 1000 ? 'selected' : '' }}>1000 ml</option>
                    <option value="1500" {{ $donation->volume_ml == 1500 ? 'selected' : '' }}>1500 ml</option>
                </select>
            </div>

            <!-- Botões de Ação -->
            <div class="flex justify-between mt-6">
                <!-- Botão de Cancelar -->
                <a href="{{ route('donations.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
                    Cancelar
                </a>

                <!-- Botão de Atualizar -->
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
