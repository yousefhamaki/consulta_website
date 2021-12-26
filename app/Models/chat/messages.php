<?php

namespace App\Models\chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'id',
        'user_id',
        'from_id',
        'message',
        'files',
        "seen",
        'created_at'
    ];
}
