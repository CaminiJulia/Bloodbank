<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Donor extends Model
{
    protected $fillable = [
        'user_id', 'blood_type_id', 'birth_date', 'phone', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

