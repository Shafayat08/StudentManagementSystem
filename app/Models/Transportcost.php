<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportcost extends Model
{
    use HasFactory;

    protected $table= 'transport_cost';

    public function car() {
        return $this->belongsTo(Transportationcar::class, 'car_type_id', 'id');
    }

    public function type() {
        return $this->belongsTo(Transporttype::class, 'transport_type_id', 'id');
    }
}
