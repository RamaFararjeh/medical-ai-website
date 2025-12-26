<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    //
    protected $fillable = [
        'user_id','age','gender','duration','severity',
        'risk','top_disease','top_probability',
        'predictions','notes',
    ];

    protected $casts = [
        'predictions'      => 'array',
        'top_probability'  => 'float',
    ];

    public function symptoms()
    {
        return $this->hasMany(DiagnosisSymptom::class);
    }
}
