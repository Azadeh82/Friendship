<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;
    
    public function message() {
        return $this->belongsTo(Message::class);
    }

    public function user() {
        return $this->belongsTo('app\Models\User');
    }
}
