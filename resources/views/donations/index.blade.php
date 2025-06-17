<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Doações') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('donations.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Nova Doação
            </a>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th>Doador</th>
                            <th>Receptor</th>
                            <th>Data</th>
                            <th>Volume (ml)</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                            <tr>
                                <td>{{ $donation->donor->user->name ?? 'N/A' }}</td>
                                <td>{{ $donation->recipient->name ?? '—' }}</td>
                                <td>{{ $donation->date }}</td>
                                <td>{{ $donation->volume_ml }}</td>
                                <td class="flex gap-2">
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

                        @if ($donations->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4">Nenhuma doação registrada.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
