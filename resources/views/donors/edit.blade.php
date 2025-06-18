<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Doador - Bloodbank</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-900">

<header class="bg-red-600 text-white p-4 shadow text-center">
    <h1 class="text-xl font-bold">Bloodbank</h1>
</header>

<main class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-8">

        <h2 class="text-2xl font-bold mb-6 text-center text-red-600">Editar Doador</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('donors.update', $donor->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block mb-1 font-medium text-sm text-gray-700">Nome</label>
                <input type="text" name="name" id="name" value="{{ $donor->user->name ?? '' }}" required
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </div>

            <div>
                <label for="blood_type_id" class="block mb-1 font-medium text-sm text-gray-700">Tipo Sanguíneo</label>
                <select name="blood_type_id" id="blood_type_id" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    @foreach ($bloodTypes as $type)
                        <option value="{{ $type->id }}" {{ $donor->blood_type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="birth_date" class="block mb-1 font-medium text-sm text-gray-700">Data de nascimento</label>
                <input type="date" name="birth_date" id="birth_date" value="{{ $donor->birth_date }}" required
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </div>

            <div>
                <label for="phone" class="block mb-1 font-medium text-sm text-gray-700">Telefone</label>
                <input type="text" name="phone" id="phone" value="{{ $donor->phone }}" required
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </div>

            <div>
                <label for="address" class="block mb-1 font-medium text-sm text-gray-700">Endereço</label>
                <input type="text" name="address" id="address" value="{{ $donor->address }}" required
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
            </div>

            <!-- Botões de Ação -->
            <div class="flex justify-between mt-6">
                <!-- Botão de Cancelar -->
                <a href="{{ route('donors.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
                    Cancelar
                </a>

                <!-- Botão de Atualizar -->
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                    Atualizar
                </button>
            </div>
        </form>

    </div>
</main>

</body>
</html>
