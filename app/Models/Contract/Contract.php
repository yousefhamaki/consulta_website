<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = ['id', 'header_id', 'value'];

    public function Header()
    {
        return $this->belongsTo(related: 'App\Models\Contract\Header', foreignKey: 'header_id');
    }
}
