<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractHeader extends Model
{
    use HasFactory;
    protected $table = 'contract_header';
    protected $fillable = ['id', 'section_id', 'name'];

    public function Contract()
    {
        return $this->hasMany(related: 'App\Models\Contract', foreignKey: 'header_id', localKey: 'id');
    }

    public function ContractSection()
    {
        return $this->belongsTo(related: 'App\Models\ContractSection', foreignKey: 'section_id');
    }
}
