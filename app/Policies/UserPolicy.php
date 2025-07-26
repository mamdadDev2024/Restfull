<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function importantAccess($user1 , $user2)
    {
        return $user1->isAdmin() || $user1->id == $user2->id;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $visitor, User $user): bool
    {
        return $this->importantAccess($visitor , $user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $updator, User $user): bool
    {
        return $this->importantAccess($updator , $user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $deletor, User $user): bool
    {
        return $this->importantAccess($deletor , $user);
    }
}
