<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta_option extends Model
{
    use HasFactory;
    protected $table = 'consulta_option';
    protected $fillable = ['id', 'img', 'name', 'detais', 'time'];

}
