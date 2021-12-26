<?php

namespace App\Models\Law;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;
    protected $table = 'law_opening';
    protected $fillable = ['id', 'law_id', 'content'];
}
