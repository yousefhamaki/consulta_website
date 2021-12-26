<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForkOption extends Model
{
    use HasFactory;

    protected $table = 'forks_options';
    protected $fillable = ['id', "fork_id", 'name', "order", "status"];

    public function fork_option_option()
    {
        return $this->hasMany(related: 'App\Models\Menu\ForkOptionOption', foreignKey: 'option_id', localKey: 'id');
    }

    public function menu_fork()
    {
        return $this->belongsTo(related: 'App\Models\Menu\Menufork', foreignKey: 'fork_id');
    }
}
