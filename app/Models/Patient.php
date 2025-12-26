<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','email','phone','password','is_active','last_login_at'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
