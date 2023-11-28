<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table= 'supplier';

    public function type() {
        return $this->belongsTo(Suppliertype::class, 's_type_id', 'id');
    }
}
