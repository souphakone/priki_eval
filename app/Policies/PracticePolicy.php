<?php

namespace App\Policies;

use App\Models\Practice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PracticePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Practice $practice)
    {
        switch ($user->role->slug) {
            case "MOD": // Moderators can see everything
                return true;
                break;
            default: // others can only see what is published
                return $practice->publicationState->slug === "PUB";
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Practice $practice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Practice $practice)
    {
        //
    }

    /**
     * Users that publish a practice MUST be moderators who have given their opinion about the practice
     * @param Practice $practice
     * @param User $user
     * @return bool
     */
    public function publish(User $user, Practice $practice)
    {
        if ($user->role->slug != 'MOD') return false; // User must be moderator
        if ($practice->publicationState->slug != 'PRO') return false; // Practice must be proposed
        if ($practice->opinionOf($user)) { // User must have spoken
            return true;
        } else {
            return false;
        }
    }
}
