<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Team extends Authenticatable
{
    use HasFactory;

    protected $table = 'team';
    protected $fillable = ['id', 'name', 'email', 'password', 'options', 'img', 'job_title', 'status'];
    protected $hidden = 'password';
}
