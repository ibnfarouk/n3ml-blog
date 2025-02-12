<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'photo','published_at'];

    // casts
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphedByMany(Tag::class, 'postable');
    }

    public function favourites(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'postable');
    }

    // attributes
    public function getSubTitleAttribute(): string
    {
        return Str::words($this->content, 7, '...');
    }

    // scopes
    public function scopeOfPublished()
    {
        return $this->where('published_at', '<=', now());
    }
}
