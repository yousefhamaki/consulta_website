<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menufork extends Model
{
    use HasFactory;
    protected $table = 'menu_forks';
    protected $fillable = ['id', "menu_id", 'name', "logo","status"];

    public function menu()
    {
        return $this->belongsTo(related: 'App\Models\Menu\Menu', foreignKey: 'menu_id');
    }

    public function fork_option()
    {
        return $this->hasMany(related: 'App\Models\Menu\ForkOption', foreignKey: 'fork_id', localKey: 'id');
    }
}
