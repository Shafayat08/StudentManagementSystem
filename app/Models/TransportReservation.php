<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportReservation extends Model
{
    use HasFactory;

    protected $table= 'transport_reservation';

    public function tour() {
        return $this->belongsTo(Tourleadertour::class, 'tourleader_tour_id', 'id');
    }
    public function supply() {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
