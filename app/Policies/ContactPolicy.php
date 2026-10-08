<?php

namespace App\Policies;

use App\Enums\Enums\UserRole;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === UserRole::Admin;
    }

    public function viewOwned(User $user, Customer $customer): bool
    {
        return $user->role === UserRole::Customer && $customer->user_id === $user->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contact $contact): bool
    {
        return $user->role === UserRole::Admin
            || ($user->role === UserRole::Customer && $user->customer->id === $contact->customer_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Customer $customer): bool
    {
        return $user->role === UserRole::Admin
            || ($user->role === UserRole::Customer && $customer->user_id == $user->id);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contact $contact): bool
    {
        return $user->role === UserRole::Admin
            || ($user->role === UserRole::Customer && $user->customer->id === $contact->customer_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contact $contact): bool
    {
        return $user->role === UserRole::Admin
            || ($user->role === UserRole::Customer && $user->customer->id === $contact->customer_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Contact $contact): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Contact $contact): bool
    {
        return false;
    }
}
