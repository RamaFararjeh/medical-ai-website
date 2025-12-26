<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    //
    protected $table = 'process';

    protected $fillable = ['items'];

    protected $casts = [
        'items' => 'array',
    ];
}
