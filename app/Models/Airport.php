<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $table= 'airports';

    public function cntry() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function cty() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
