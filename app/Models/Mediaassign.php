<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediaassign extends Model
{
    use HasFactory;

    protected $table= 'sight_media';

    public function sight() {
        return $this->belongsTo(Sight::class, 'sight_id', 'id');
    }

    public function type() {
        return $this->belongsTo(Media::class, 'media_type_id', 'id');
    }

}
