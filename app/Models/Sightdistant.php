<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sightdistant extends Model
{
    use HasFactory;
    
    protected $table= 'sights_distant';
    
    public function cntry() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function cty() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
