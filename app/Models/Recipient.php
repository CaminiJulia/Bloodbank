<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'blood_type_id'
    ];

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
