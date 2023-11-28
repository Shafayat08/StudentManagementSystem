<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dayitinerary extends Model
{
    use HasFactory;

    protected $table= 'day_itinerary';

    public function gti() {
        return $this->belongsTo(Gti::class, 'gti_id', 'id');
    }
    public function cntry() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function cty() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    
    public function act() {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }

    public function sight() {
        return $this->belongsTo(Sight::class, 'sight_id', 'id');
    }

    public function dis() {
        return $this->belongsTo(Sightdistant::class, 'sight_distant_id', 'id');
    }

    public function air() {
        return $this->belongsTo(Airport::class, 'airport_id', 'id');
    }
}
