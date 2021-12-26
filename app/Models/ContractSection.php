<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractSection extends Model
{
    use HasFactory;
    protected $table = 'contract_section';
    protected $fillable = ['id', 'section', 'logo'];

    public function ContractHeader()
    {
        return $this->hasMany(related: 'App\Models\ContractHeader', foreignKey: 'section_id', localKey: 'id');
    }
}
