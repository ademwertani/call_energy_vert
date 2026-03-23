<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'language',
        'short_description',
        'missions',
        'requirements',
        'location',
        'contract_type',
        'is_active',
        'sort_order',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($career) {
            if (empty($career->slug)) {
                $career->slug = Str::slug($career->title . '-' . uniqid());
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(CareerApplication::class);
    }

    public function getMissionsListAttribute()
    {
        if (!$this->missions) {
            return [];
        }

        return array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->missions)));
    }

    public function getRequirementsListAttribute()
    {
        if (!$this->requirements) {
            return [];
        }

        return array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->requirements)));
    }
}