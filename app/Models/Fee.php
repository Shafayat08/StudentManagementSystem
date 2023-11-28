<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $table= 'hotel_fees';

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
    public function accom() {
        return $this->belongsTo(Accommodation::class, 'accommodation_type_id', 'id');
    }
}
