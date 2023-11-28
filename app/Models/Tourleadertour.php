<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourleadertour extends Model
{
    use HasFactory;
    protected $table= 'tourleader_tour';

    public function gti() {
        return $this->belongsTo(Gti::class, 'gti_id', 'id');
    }
    public function tleader() {
        return $this->belongsTo(Tourleader::class, 'tourleader_id', 'id');
    }

}
