<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory;
    protected $table = 'law';
    protected $fillable = ['id', 'law_name'];
    // protected $hidden = ['created_at', 'updated_at'];
}
