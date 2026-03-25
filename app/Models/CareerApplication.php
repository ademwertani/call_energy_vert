<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'career_id',
        'full_name',
        'email',
        'phone',
        'cv',
        'message',
        'experience_level',
        'immediate_availability',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}