<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\Recipient;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        // Recupera todas as doações, incluindo os doadores e receptores
        $donations = Donation::with(['donor', 'recipient'])->get();
        return view('donations.index', compact('donations'));
    }

    public function create()
    {
        // Recupera todos os doadores e receptores para exibir no formulário
        $donors = Donor::all();
        $recipients = Recipient::all();
        return view('donations.create', compact('donors', 'recipients'));
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'recipient_id' => 'nullable|exists:recipients,id',
            'date' => 'required|date',
            'volume_ml' => 'required|in:250,500,1000,1500', // Validando o valor de volume_ml
        ]);

        // Criação de uma nova doação
        Donation::create([
            'donor_id' => $request->donor_id,
            'recipient_id' => $request->recipient_id,
            'date' => $request->date,
            'volume_ml' => $request->volume_ml, // Passando volume_ml para o banco
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('donations.index')->with('success', 'Doação registrada!');
    }

    public function edit(Donation $donation)
    {
        // Recupera todos os doadores e receptores para exibir no formulário de edição
        $donors = Donor::all();
        $recipients = Recipient::all();
        return view('donations.edit', compact('donation', 'donors', 'recipients'));
    }

    public function update(Request $request, Donation $donation)
    {
        // Validação dos campos
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'recipient_id' => 'nullable|exists:recipients,id',
            'date' => 'required|date',
            'volume_ml' => 'required|in:250,500,1000,1500', // Validando o valor de volume_ml
        ]);

        // Atualização da doação
        $donation->update([
            'donor_id' => $request->donor_id,
            'recipient_id' => $request->recipient_id,
            'date' => $request->date,
            'volume_ml' => $request->volume_ml, // Garantindo que volume_ml seja atualizado
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('donations.index')->with('success', 'Doação atualizada!');
    }

    public function destroy(Donation $donation)
    {
        // Exclui a doação
        $donation->delete();
        return redirect()->route('donations.index')->with('success', 'Doação excluída!');
    }
}
