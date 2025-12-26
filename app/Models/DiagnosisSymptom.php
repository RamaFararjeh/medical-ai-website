<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosisSymptom extends Model
{
    //
    protected $fillable = ['diagnosis_id','symptom'];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }
}
