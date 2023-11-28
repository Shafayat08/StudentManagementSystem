<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrangeflight extends Model
{
    use HasFactory;

    protected $table= 'airline_ticket';
    
    public function psngr(){
        return $this->belongsTo(Passengerinfo::class, 'passenger_id', 'id');
    }
    public function city_depart(){
        return $this->belongsTo(Airport::class, 'city_of_depart', 'id');
    }
    public function city_arrival(){
        return $this->belongsTo(Airport::class, 'city_of_arrival', 'id');
    }

}
