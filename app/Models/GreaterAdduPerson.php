<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GreaterAdduPerson extends Model
{
    protected $table = 'greater_addu_people';

    protected $fillable = [
        'slug',
        'gender',
        'name_en',
        'name_dv',
        'role_en',
        'role_dv',
        'bio1_en',
        'bio1_dv',
        'bio2_en',
        'bio2_dv',
        'social',
        'photo',
    ];

    protected $casts = [
        'social' => 'array',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $person): void {
            if (empty($person->slug) && ! empty($person->name_en)) {
                $person->slug = static::generateUniqueSlug($person->name_en);
            }
        });

        static::updating(function (self $person): void {
            if ($person->isDirty('name_en') && ! $person->isDirty('slug')) {
                $person->slug = static::generateUniqueSlug($person->name_en, $person->getKey());
            }
        });
    }

    protected static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->whereKeyNot($ignoreId))
            ->exists()
        ) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    public function getDisplayName(string $language): string
    {
        if ($language === 'dv' && !empty($this->name_dv)) {
            return $this->name_dv;
        }

        return $this->name_en;
    }

    public function getDisplayRole(string $language): ?string
    {
        if ($language === 'dv' && !empty($this->role_dv)) {
            return $this->role_dv;
        }

        return $this->role_en;
    }
}

