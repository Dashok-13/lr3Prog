<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id', 
        'front_text',
        'back_text',
        'example_sentence',
        'pronunciation',
        'image_url',
        'audio_url',
        'difficulty_level',
        'next_review_at',
        'is_public'
    ];

    protected $casts = [
        'next_review_at' => 'datetime',
        'is_public' => 'boolean',
    ];

    public function author(): BelongsTo 
    { 
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function category(): BelongsTo 
    { 
        return $this->belongsTo(Category::class); 
    }

    public function tags(): BelongsToMany 
    { 
        return $this->belongsToMany(Tag::class); 
    }

    public function progress(): HasMany 
    { 
        return $this->hasMany(UserCardProgress::class); 
    }
}