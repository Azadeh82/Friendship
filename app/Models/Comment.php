<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function message() {
        return $this->belongsTo('app\Models\Message');
    }

    public function user() {
        return $this->belongsTo('app\Models\User');
    }
}
