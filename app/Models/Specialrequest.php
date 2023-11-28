<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialrequest extends Model
{
    use HasFactory;
    protected $table= 'special_request';

    protected $fillable = ['passenger_id', 'special_request'];

    public function psngr(){
        return $this->belongsTo(Passengerinfo::class, 'passenger_id', 'id');
    }
}
