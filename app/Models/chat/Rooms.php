<?php

namespace App\Models\chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'id',
        'user_id',
        'manager_id',
        'status',
        'created_at'
    ];
}
