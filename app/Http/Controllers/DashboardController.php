<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Recipient;
use App\Models\Donation;
use App\Models\BloodType;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'donors' => Donor::count(),
            'recipients' => Recipient::count(),
            'donations' => Donation::count(),
            'bloodTypes' => BloodType::count(),
        ]);
    }
}
