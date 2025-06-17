<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Receptores') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <a href="{{ route('recipients.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Novo Receptor
        </a>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow p-6 rounded">
            <table class="w-full">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Tipo Sanguíneo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recipients as $recipient)
                        <tr>
                            <td>{{ $recipient->name }}</td>
                            <td>{{ $recipient->email }}</td>
                            <td>{{ $recipient->phone }}</td>
                            <td>{{ $recipient->bloodType->type }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('recipients.edit', $recipient) }}" class="text-blue-600 hover:underline">Editar</a>
                                <form method="POST" action="{{ route('recipients.destroy', $recipient) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Confirmar exclusão?')" class="text-red-600 hover:underline">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4">Nenhum receptor registrado.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
