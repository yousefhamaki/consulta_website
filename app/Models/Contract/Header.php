<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;
    protected $table = 'contract_header';
    protected $fillable = ['id', 'section_id', 'name'];

    public function contract()
    {
        return $this->hasMany(related: 'App\Models\Contract\Contract', foreignKey: 'header_id', localKey: 'id');
    }

    public function Section()
    {
        return $this->belongsTo(related: 'App\Models\Contract\Section', foreignKey: 'section_id');
    }
}
