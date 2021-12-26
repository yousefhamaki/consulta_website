<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationA extends Model
{
    use HasFactory;

    protected $table = 'admin_notification';
    protected $fillable = ['id', 'from_id', 'to_id', 'type', 'notification', 'status', 'created_at', 'updated_at'];
}
