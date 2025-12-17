<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoodEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'time',
        'emotion',
        'specific_emotion',
        'tags',
        'intensity',
        'notes',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


