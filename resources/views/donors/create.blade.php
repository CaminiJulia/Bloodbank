@extends('layouts.app')

@section('title', 'Adicionar Doador')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Novo Doador</h2>

        <form action="{{ route('donors.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="blood_type_id" class="block text-sm font-medium text-gray-700">Tipo Sanguíneo</label>
                <select name="blood_type_id" id="blood_type_id" class="w-full mt-1 border-gray-300 rounded">
                    @foreach($bloodTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input type="date" name="birth_date" id="birth_date" class="w-full mt-1 border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                <input type="text" name="phone" id="phone" class="w-full mt-1 border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
                <input type="text" name="address" id="address" class="w-full mt-1 border-gray-300 rounded" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Salvar</button>
            </div>
        </form>
    </div>
@endsection
