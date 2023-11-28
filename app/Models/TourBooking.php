<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;

    protected $table= 'tour_bookings';

    public function gti() {
        return $this->belongsTo(Gti::class, 'gti_id', 'id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'deparature_city', 'id');
    }
}
