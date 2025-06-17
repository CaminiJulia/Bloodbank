<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'donor_id', 'date', 'status'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}

