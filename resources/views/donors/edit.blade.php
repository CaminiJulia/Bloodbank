<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Doador') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-md p-6">
            <form method="POST" action="{{ route('donors.update', $donor->id) }}">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x-label for="blood_type_id" :value="'Tipo Sanguíneo'" />
                    <select name="blood_type_id" class="block mt-1 w-full" required>
                        @foreach ($bloodTypes as $type)
                            <option value="{{ $type->id }}" {{ $donor->blood_type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="birth_date" :value="'Data de nascimento'" />
                    <x-input id="birth_date" type="date" name="birth_date" value="{{ $donor->birth_date }}" class="mt-1 block w-full" required />
                </div>

                <div class="mt-4">
                    <x-label for="phone" :value="'Telefone'" />
                    <x-input id="phone" type="text" name="phone" value="{{ $donor->phone }}" class="mt-1 block w-full" required />
                </div>

                <div class="mt-4">
                    <x-label for="address" :value="'Endereço'" />
                    <x-input id="address" type="text" name="address" value="{{ $donor->address }}" class="mt-1 block w-full" required />
                </div>

                <div class="mt-6 flex justify-between">
                    <x-button class="bg-blue-600 hover:bg-blue-700">
                        {{ __('Atualizar') }}
                    </x-button>

                    <a href="{{ route('donors.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
