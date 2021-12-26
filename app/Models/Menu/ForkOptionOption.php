<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForkOptionOption extends Model
{
    use HasFactory;

    protected $table = 'forks_option_option';
    protected $fillable = ['id', "option_id", 'name', "status"];

    public function forkoption()
    {
        return $this->belongsTo(related: 'App\Models\Menu\ForkOption', foreignKey: 'option_id');
    }
}
