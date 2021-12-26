<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = ['id', 'user_id', 'report_message', 'type', 'link', 'img', 'time'];


    ####################### start relations ######################
    // one to one
    // public function user()
    // {
    //     return $this->belongsTo(related: 'App\Models\User', foreignKey: 'user_id');
    // }
    // one to many
    public function user()
    {
        return $this->belongsTo(related: 'App\Models\User', foreignKey: 'user_id');
    }

    ####################### end relations ######################
}
