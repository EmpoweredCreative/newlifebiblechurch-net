<?php

namespace App\Models;

use Database\Factories\SermonFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable(['title', 'slug', 'description', 'video_url', 'published_at'])]
class Sermon extends Model
{
    /** @use HasFactory<SermonFactory> */
    use HasFactory;
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublishedLatest(Builder $query): Builder
    {
        return $query->orderByDesc('published_at')->orderByDesc('id');
    }

    protected static function booted(): void
    {
        static::creating(function (Sermon $sermon): void {
            if (empty($sermon->slug)) {
                $sermon->slug = static::uniqueSlugFromTitle($sermon->title);
            }
        });
    }

    public static function uniqueSlugFromTitle(string $title): string
    {
        $base = Str::slug($title);
        if ($base === '') {
            $base = 'sermon';
        }

        $slug = $base;
        $n = 1;
        while (static::query()->where('slug', $slug)->exists()) {
            $slug = $base.'-'.$n;
            $n++;
        }

        return $slug;
    }
}
