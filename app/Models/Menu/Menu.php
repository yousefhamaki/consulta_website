<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['id', 'name', "table_connect", "status"];

    public function menufork()
    {
        return $this->hasMany(related: 'App\Models\Menu\Menufork', foreignKey: 'menu_id', localKey: 'id');
    }
}
