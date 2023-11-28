<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guidereservation extends Model
{
    use HasFactory;
    protected $table= 'guide_reservation';

    public function guide() {
        return $this->belongsTo(Guide::class, 'guide_id', 'id');
    }
    public function tour() {
        return $this->belongsTo(Tourleadertour::class, 'tourleader_tour_id', 'id');
    }
}
