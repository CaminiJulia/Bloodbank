<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    // Permite a atribuição em massa dos campos
    protected $fillable = [
        'donor_id', 'recipient_id', 'date', 'volume_ml'  // Alterado 'quantity_ml' para 'volume_ml'
    ];

    // Relacionamento com o modelo Donor
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    // Relacionamento com o modelo Recipient
    public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }
}
