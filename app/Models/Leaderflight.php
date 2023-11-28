<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderflight extends Model
{
    use HasFactory;

    protected $table= 'leader_flight';

    public function tour() {
        return $this->belongsTo(Tourleadertour::class, 'tourleader_tour_id', 'id');
    }
}
