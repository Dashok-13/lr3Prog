<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CardPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Card $card): bool
    {
        return $card->is_public || $card->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Card $card): bool
    {
        return $card->user_id === $user->id;
    }

    public function delete(User $user, Card $card): bool
    {
        return $card->user_id === $user->id;
    }

    public function restore(User $user, Card $card): bool
    {
        return $card->user_id === $user->id;
    }

    public function forceDelete(User $user, Card $card): bool
    {
        return $card->user_id === $user->id;
    }
}