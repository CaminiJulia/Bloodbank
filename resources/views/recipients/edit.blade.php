<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Receptor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-900">

<header class="bg-blue-600 text-white p-4 shadow text-center">
    <h1 class="text-xl font-bold">Bloodbank</h1>
</header>

<main class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Editar Receptor</h2>

        @if ($errors->any())
            <div class="bg-blue-100 text-blue-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('recipients.update', $recipient) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div>
                <label for="name" class="block mb-1 font-medium text-sm text-gray-700">Nome</label>
                <input type="text" name="name" id="name" value="{{ $recipient->name }}" 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <!-- Telefone -->
            <div>
                <label for="phone" class="block mb-1 font-medium text-sm text-gray-700">Telefone</label>
                <input type="text" name="phone" id="phone" value="{{ $recipient->phone }}" 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Endereço -->
            <div>
                <label for="address" class="block mb-1 font-medium text-sm text-gray-700">Endereço</label>
                <input type="text" name="address" id="address" value="{{ $recipient->address }}" 
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <!-- Tipo Sanguíneo -->
            <div>
                <label for="blood_type_id" class="block mb-1 font-medium text-sm text-gray-700">Tipo Sanguíneo</label>
                <select name="blood_type_id" id="blood_type_id" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($bloodTypes as $bt)
                        <option value="{{ $bt->id }}" {{ $recipient->blood_type_id == $bt->id ? 'selected' : '' }}>{{ $bt->type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botões de Ação -->
            <div class="flex justify-between mt-6">
                <!-- Botão de Cancelar -->
                <a href="{{ route('recipients.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
                    Cancelar
                </a>

                <!-- Botão de Atualizar -->
                <button type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
