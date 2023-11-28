<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passengerpayment extends Model
{
    use HasFactory;
    protected $table= 'passenger_payment';

    public function method() {
        return $this->belongsTo(Paymentmethod::class, 'type_id', 'id');
    }

    public function tour() {
        return $this->belongsTo(Tourleadertour::class, 'tourleader_tour_id', 'id');
    }

    public function pass() {
        return $this->belongsTo(Passengerinfo::class, 'passenger_id', 'id');
    }
}
