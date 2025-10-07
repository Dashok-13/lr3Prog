<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserCardProgress;

class UserCardProgressPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, UserCardProgress $progress): bool
    {
        return $progress->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, UserCardProgress $progress): bool
    {
        return $progress->user_id === $user->id;
    }

    public function delete(User $user, UserCardProgress $progress): bool
    {
        return $progress->user_id === $user->id;
    }
}