<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\BloodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    // Lista todos os doadores
    public function index()
    {
        $donors = Donor::with('bloodType', 'user')->get();
        return view('donors.index', compact('donors'));
    }

    // Mostra o formulário de criação de doador
    public function create()
    {
        $bloodTypes = BloodType::all();
        return view('donors.create', compact('bloodTypes'));
    }

    // Armazena um novo doador
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'blood_type_id' => 'required|exists:blood_types,id',
        'birth_date' => 'required|date',
        'phone' => 'required',
        'address' => 'required',
    ]);

    Donor::create([
        'user_id' => Auth::id(),
        'name' => $request->name,
        'blood_type_id' => $request->blood_type_id,
        'birth_date' => $request->birth_date,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()->route('donors.index')->with('success', 'Doador cadastrado!');
}

    // Mostra o formulário de edição
    public function edit(Donor $donor)
    {
        $bloodTypes = BloodType::all();
        return view('donors.edit', compact('donor', 'bloodTypes'));
    }

    // Atualiza um doador existente
    public function update(Request $request, Donor $donor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'blood_type_id' => 'required|exists:blood_types,id',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $donor->update([
            'name' => $request->name,
            'blood_type_id' => $request->blood_type_id,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('donors.index')->with('success', 'Doador atualizado!');
    }

    // Exclui um doador
    public function destroy(Donor $donor)
    {
        $donor->delete();
        return redirect()->route('donors.index')->with('success', 'Doador excluído!');
    }
}
