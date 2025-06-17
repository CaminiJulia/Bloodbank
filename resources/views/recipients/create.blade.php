<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Novo Receptor') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('recipients.store') }}">
                @csrf

                <x-input-label value="Nome" />
                <x-text-input type="text" name="name" class="w-full mb-4" required />

                <x-input-label value="Email" />
                <x-text-input type="email" name="email" class="w-full mb-4" />

                <x-input-label value="Telefone" />
                <x-text-input type="text" name="phone" class="w-full mb-4" />

                <x-input-label value="Endereço" />
                <x-text-input type="text" name="address" class="w-full mb-4" />

                <x-input-label value="Tipo Sanguíneo" />
                <select name="blood_type_id" class="w-full mb-4 border-gray-300 rounded">
                    @foreach ($bloodTypes as $bt)
                        <option value="{{ $bt->id }}">{{ $bt->type }}</option>
                    @endforeach
                </select>

                <x-primary-button>Salvar</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
