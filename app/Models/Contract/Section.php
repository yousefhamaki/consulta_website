<?php

namespace App\Models\Contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'contract_section';
    protected $fillable = ['id', 'section', 'logo'];
}
