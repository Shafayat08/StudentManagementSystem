<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sightreservation extends Model
{
    use HasFactory;

    protected $table= 'sights_reservation';

    public function sight() {
        return $this->belongsTo(Sight::class, 'sight_id', 'id');
    }

    public function tour() {
        return $this->belongsTo(Tourleadertour::class, 'tour_leader_tour_id', 'id');
    }
}
