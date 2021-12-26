<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        'user_id',
        'name',
        'room_id',
        "about",
        "status"
    ];

    public function messages()
    {
        return $this->hasMany('App\Models\ChatMessage');
    }
}
