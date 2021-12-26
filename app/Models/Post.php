<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['id', 'title', 'content', 'img', 'img2', 'created_at', 'updated_at'];
    // protected $hidden = ['content'];
}
