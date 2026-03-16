<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreaterAdduContact extends Model
{
    protected $table = 'greater_addu_contacts';

    protected $fillable = [
        'email_en',
        'email_dv',
        'phone_en',
        'phone_dv',
        'address_en',
        'address_dv',
        'facebook_url',
        'x_url',
        'instagram_url',
    ];

    public static function current(): ?self
    {
        return static::query()->latest('id')->first();
    }
}

