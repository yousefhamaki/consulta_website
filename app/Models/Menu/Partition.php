<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partition extends Model
{
    use HasFactory;
    protected $table = 'important_patritions';
    protected $fillable = ['id', 'name', "img", "link", "connect", "status"];
    public $timestamps = false;
}
