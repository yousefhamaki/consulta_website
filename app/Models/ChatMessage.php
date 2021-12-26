<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';
    protected $fillable = [
        "id",
        'chat_room_id',
        'user_id',
        'admin_id',
        "message",
        "files"
    ];

    public function room()
    {
        return $this->hasOne('App\Models\ChatMessage', "id", "chat_room_id");
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', "id", "user_id");
    }
}
