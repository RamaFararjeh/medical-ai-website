<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'name','specialty','age','gender','email','phone',
        'years_experience','photo','bio','is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'age' => 'integer',
        'years_experience' => 'integer',
    ];

    // Helper: full photo url (if you use storage)
    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->photo) {
            return null;
        }
    
        // استخدم route('media.public') بدلاً من asset()
        return route('media.public', ['path' => $this->photo]);
    }
}
