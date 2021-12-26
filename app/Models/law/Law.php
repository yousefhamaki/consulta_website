<?php

namespace App\Models\law;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory;
    protected $table = 'law';
    protected $fillable = ['id', 'law_name', "content", 'file'];

}