<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use App\Models\BloodType;
use Illuminate\Http\Request;

class RecipientController extends Controller
{
    public function index()
    {
        $recipients = Recipient::with('bloodType')->get();
        return view('recipients.index', compact('recipients'));
    }

    public function create()
    {
        $bloodTypes = BloodType::all();
        return view('recipients.create', compact('bloodTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'blood_type_id' => 'required|exists:blood_types,id',
        ]);

        Recipient::create($request->all());

        return redirect()->route('recipients.index')->with('success', 'Receptor cadastrado com sucesso!');
    }

    public function edit(Recipient $recipient)
    {
        $bloodTypes = BloodType::all();
        return view('recipients.edit', compact('recipient', 'bloodTypes'));
    }

    public function update(Request $request, Recipient $recipient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'blood_type_id' => 'required|exists:blood_types,id',
        ]);

        $recipient->update($request->all());

        return redirect()->route('recipients.index')->with('success', 'Receptor atualizado com sucesso!');
    }

    public function destroy(Recipient $recipient)
    {
        $recipient->delete();

        return redirect()->route('recipients.index')->with('success', 'Receptor excluído com sucesso!');
    }
}
