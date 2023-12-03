<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchased extends Model
{
    use HasFactory;

    protected $table= 'purchased';

    public function std() {
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }
}
