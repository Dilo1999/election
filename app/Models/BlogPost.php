<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'title_dv',
        'slug',
        'category',
        'category_dv',
        'author',
        'published_at',
        'read_time',
        'read_time_dv',
        'image',
        'intro',
        'intro_dv',
        'conclusion',
        'conclusion_dv',
        'meta_title',
        'meta_description',
        'content',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    /**
     * Get content blocks as array (stored as JSON in DB).
     */
    public function getContentAttribute($value): array
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);

            return is_array($decoded) ? $decoded : [];
        }

        return is_array($value) ? $value : [];
    }

    /**
     * Normalize content from Filament Repeater (assoc array with UUID keys) to indexed array for JSON.
     */
    public function setContentAttribute($value): void
    {
        if (is_array($value)) {
            $this->attributes['content'] = json_encode(array_values($value));
        } else {
            $this->attributes['content'] = $value;
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (BlogPost $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    /**
     * Get the previous post by published_at order.
     */
    public function getPrevPostAttribute(): ?self
    {
        return static::where('published_at', '<=', $this->published_at)
            ->where('id', '!=', $this->id)
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->first();
    }

    /**
     * Get the next post by published_at order.
     */
    public function getNextPostAttribute(): ?self
    {
        return static::where('published_at', '>=', $this->published_at)
            ->where('id', '!=', $this->id)
            ->orderBy('published_at', 'asc')
            ->orderBy('id', 'asc')
            ->first();
    }

    /**
     * Scope: only published (has published_at set).
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    /**
     * Resolve image value to a full URL (storage path or external URL).
     */
    public static function resolveImageUrl(?string $value): ?string
    {
        if (empty($value)) {
            return null;
        }
        if (Str::startsWith($value, 'http')) {
            return $value;
        }

        return asset('storage/'.ltrim($value, '/'));
    }

    /**
     * Hero image URL (handles both uploaded path and external URL).
     */
    public function getImageUrlAttribute(): ?string
    {
        return static::resolveImageUrl($this->image);
    }

    /**
     * OG/image URL for SEO (uses hero image).
     */
    public function getOgImageUrlAttribute(): ?string
    {
        return $this->image_url;
    }
}
