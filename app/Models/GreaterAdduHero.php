<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreaterAdduHero extends Model
{
    protected $table = 'greater_addu_heroes';

    protected $fillable = [
        'hashtag_en',
        'hashtag_dv',
        'header_en',
        'header_dv',
        'sub_en',
        'sub_dv',
        'intro_en',
        'intro_dv',
        'history_en',
        'history_dv',
        'challenge_en',
        'challenge_dv',
        'question_en',
        'question_dv',
        'vision_en',
        'vision_dv',
    ];

    public static function current(): ?self
    {
        return static::query()->latest('id')->first();
    }
}

