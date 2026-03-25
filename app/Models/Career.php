<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function ($career) {
            if (empty($career->slug)) {
                $career->slug = Str::slug($career->title . '-' . uniqid());
            }
        });
    }

    public function applications(): HasMany
    {
        return $this->hasMany(CareerApplication::class);
    }

    public function getMissionsListAttribute(): array
    {
        if (empty($this->missions)) {
            return [];
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->missions))));
    }

    public function getRequirementsListAttribute(): array
    {
        if (empty($this->requirements)) {
            return [];
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $this->requirements))));
    }
}