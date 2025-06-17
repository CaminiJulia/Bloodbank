<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $fillable = ['type'];

    public function donors()
    {
        return $this->hasMany(Donor::class);
    }

    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }
}

