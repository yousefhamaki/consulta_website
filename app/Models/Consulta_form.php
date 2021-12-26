<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta_form extends Model
{
    use HasFactory;
    protected $table = 'consulta';
    protected $fillable = ['id', 'user_id', 'consulta_id', 'name', 'age', 'governorate',
                            'country', 'country_code', 'phone', 'email', 
                            'consulta', 'message', 'service_id', 'time', 'created_at', 'updated_at'];
}
