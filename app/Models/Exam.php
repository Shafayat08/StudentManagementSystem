<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table= 'exam';

    public function type() {
        return $this->belongsTo(Examtype::class, 'exam_type_id', 'id');
    }

    public function std() {
        return $this->belongsTo(Students::class, 'student_id', 'id');
    }
    public function cls() {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
