<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Doador</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

<header class="bg-red-600 text-white p-4 shadow text-center">
    <h1 class="text-xl font-bold">Bloodbank</h1>
</header>

<main class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xl mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-red-600">Cadastrar Doador</h2>

        <!-- Exibição de erros -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Doação -->
        <form action="{{ route('donors.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block mb-1 font-medium text-sm text-gray-700">Nome</label>
                <input type="text" name="name" id="name" placeholder="Nome completo"
                       value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="blood_type_id" class="block mb-1 font-medium text-sm text-gray-700">Tipo Sanguíneo</label>
                <select name="blood_type_id" id="blood_type_id"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">Selecione um tipo</option>
                    @foreach($bloodTypes as $type)
                        <option value="{{ $type->id }}" {{ old('blood_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="birth_date" class="block mb-1 font-medium text-sm text-gray-700">Data de Nascimento</label>
                <input type="date" name="birth_date" id="birth_date"
                       value="{{ old('birth_date') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="phone" class="block mb-1 font-medium text-sm text-gray-700">Telefone</label>
                <input type="text" name="phone" id="phone" placeholder="(00) 00000-0000"
                       value="{{ old('phone') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="address" class="block mb-1 font-medium text-sm text-gray-700">Endereço</label>
                <input type="text" name="address" id="address" placeholder="Rua, número, bairro, cidade"
                       value="{{ old('address') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <!-- Ações -->
            <div class="flex justify-between">
    <!-- Botão Voltar ao Dashboard -->
    <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Voltar ao Dashboard
    </a>

    <!-- Botão Cadastrar -->
    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-300">
        Cadastrar
    </button>
</div>

        </form>
    </div>
</main>

</body>
</html>
