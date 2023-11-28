<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $table= 'information';

    public function zila() {
        return $this->belongsTo(Zila::class, 'zila_id', 'id');
    }
    public function uzila() {
        return $this->belongsTo(Upazilaila::class, 'upazila_id', 'id');
    }

}