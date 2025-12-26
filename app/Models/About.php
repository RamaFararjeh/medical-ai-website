<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'about';

    protected $fillable = [
        'paragraph',
        'points',
    ];

    protected $casts = [
        'points' => 'array', // نخزنها كمصفوفة JSON
    ];
}
