<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airticket extends Model
{
    use HasFactory;

    protected $table= 'airline_ticket';

    public function psngr() {
        return $this->belongsTo(Passengerinfo::class, 'passenger_id', 'id');
    }
}
