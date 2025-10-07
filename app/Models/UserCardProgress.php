<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCardProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_id',
        'correct_answers',
        'incorrect_answers', 
        'confidence_level',
        'last_reviewed_at',
        'next_review_at',
        'is_learned'
    ];

    protected $casts = [
        'last_reviewed_at' => 'datetime',
        'next_review_at' => 'datetime',
        'is_learned' => 'boolean',
    ];

    public function user(): BelongsTo 
    { 
        return $this->belongsTo(User::class); 
    }

    public function card(): BelongsTo 
    { 
        return $this->belongsTo(Card::class); 
    }
}