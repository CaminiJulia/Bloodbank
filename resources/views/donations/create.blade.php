<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Registrar Doação') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('donations.store') }}">
                @csrf

                <div class="mb-4">
                    <x-label :value="'Doador'" />
                    <select name="donor_id" class="w-full border-gray-300 rounded">
                        @foreach ($donors as $donor)
                            <option value="{{ $donor->id }}">{{ $donor->user->name ?? 'Doador #'.$donor->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <x-label :value="'Receptor (opcional)'" />
                    <select name="recipient_id" class="w-full border-gray-300 rounded">
                        <option value="">-- Nenhum --</option>
                        @foreach ($recipients as $recipient)
                            <option value="{{ $recipient->id }}">{{ $recipient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <x-label :value="'Data da Doação'" />
                    <x-input type="date" name="date" class="w-full" required />
                </div>

                <div class="mb-4">
                    <x-label :value="'Volume (ml)'" />
                    <x-input type="number" name="volume_ml" class="w-full" required />
                </div>

                <div class="flex justify-between">
                    <x-button class="bg-green-600 hover:bg-green-700">
                        Registrar
                    </x-button>
                    <a href="{{ route('donations.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
