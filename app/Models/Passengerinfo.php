<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passengerinfo extends Model
{
    use HasFactory;
    protected $table= 'passenger_information';

    public function tour() {
        return $this->belongsTo(Tourleadertour::class, 'tourleader_tour_id', 'id');
    }

    public function airport() {
        return $this->belongsTo(Airport::class, 'departure_city_id', 'id');
    }

    public function payment() {
        return $this->belongsTo(Paymentmethod::class, 'payment_id', 'id');
    }

    public function accom() {
        return $this->belongsTo(Accommodation::class, 'accomodation_id', 'id');
    }

    public function special_request(){
        return $this->hasOne(Specialrequest::class, 'passenger_id', 'id');
    }
}
