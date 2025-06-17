<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Doadores') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end mb-4">
                <a href="{{ route('donors.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Novo Doador
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                <td class="px-6 py-4 whitespace-nowrap flex gap-2">
    <a href="{{ route('donors.edit', $donor->id) }}" class="text-blue-600 hover:underline">Editar</a>

    <form action="{{ route('donors.destroy', $donor->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este doador?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
    </form>
</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum doador cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
