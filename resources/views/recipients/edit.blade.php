<form method="POST" action="{{ route('recipients.update', $recipient) }}">
    @csrf
    @method('PUT')
    <x-input-label value="Nome" />
    <x-text-input type="text" name="name" value="{{ $recipient->name }}" class="w-full mb-4" required />

    <x-input-label value="Email" />
    <x-text-input type="email" name="email" value="{{ $recipient->email }}" class="w-full mb-4" />

    <x-input-label value="Telefone" />
    <x-text-input type="text" name="phone" value="{{ $recipient->phone }}" class="w-full mb-4" />

    <x-input-label value="Endereço" />
    <x-text-input type="text" name="address" value="{{ $recipient->address }}" class="w-full mb-4" />

    <x-input-label value="Tipo Sanguíneo" />
    <select name="blood_type_id" class="w-full mb-4 border-gray-300 rounded">
        @foreach ($bloodTypes as $bt)
            <option value="{{ $bt->id }}" {{ $recipient->blood_type_id == $bt->id ? 'selected' : '' }}>{{ $bt->type }}</option>
        @endforeach
    </select>

    <x-primary-button>Atualizar</x-primary-button>
</form>
