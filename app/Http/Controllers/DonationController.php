<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with(['donor', 'recipient'])->get();
        return view('donations.index', compact('donations'));
    }

    public function create()
    {
        $donors = Donor::all();
        $recipients = Recipient::all();
        return view('donations.create', compact('donors', 'recipients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'recipient_id' => 'nullable|exists:recipients,id',
            'date' => 'required|date',
            'volume_ml' => 'required|numeric',
        ]);

        Donation::create([
            'donor_id' => $request->donor_id,
            'recipient_id' => $request->recipient_id,
            'date' => $request->date,
            'volume_ml' => $request->volume_ml,
        ]);

        return redirect()->route('donations.index')->with('success', 'Doação registrada!');
    }

    public function edit(Donation $donation)
    {
        $donors = Donor::all();
        $recipients = Recipient::all();
        return view('donations.edit', compact('donation', 'donors', 'recipients'));
    }

    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'recipient_id' => 'nullable|exists:recipients,id',
            'date' => 'required|date',
            'volume_ml' => 'required|numeric',
        ]);

        $donation->update([
            'donor_id' => $request->donor_id,
            'recipient_id' => $request->recipient_id,
            'date' => $request->date,
            'volume_ml' => $request->volume_ml,
        ]);

        return redirect()->route('donations.index')->with('success', 'Doação atualizada!');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index')->with('success', 'Doação excluída!');
    }
}
