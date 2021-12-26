<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = ['id', 'header_id', 'value'];


    public function ContractHeader()
    {
        return $this->belongsTo(related: 'App\Models\ContractHeader', foreignKey: 'header_id');
    }
}
