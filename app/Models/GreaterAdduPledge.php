<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreaterAdduPledge extends Model
{
    protected $table = 'greater_addu_pledges';

    protected $fillable = [
        'position',
        'icon',
        'title_en',
        'title_dv',
        'text_en',
        'text_dv',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $pledge): void {
            if (empty($pledge->position)) {
                $max = static::max('position') ?? 0;
                $pledge->position = $max + 1;
            }
        });
    }
}

