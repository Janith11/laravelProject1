<?php

namespace App\Policies;

use App\OwnerShedule;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any owner shedules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the owner shedule.
     *
     * @param  \App\User  $user
     * @param  \App\OwnerShedule  $ownerShedule
     * @return mixed
     */
    public function view(User $user, OwnerShedule $ownerShedule)
    {
        //
    }

    /**
     * Determine whether the user can create owner shedules.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the owner shedule.
     *
     * @param  \App\User  $user
     * @param  \App\OwnerShedule  $ownerShedule
     * @return mixed
     */
    public function update(User $user, OwnerShedule $ownerShedule)
    {
        //
    }

    /**
     * Determine whether the user can delete the owner shedule.
     *
     * @param  \App\User  $user
     * @param  \App\OwnerShedule  $ownerShedule
     * @return mixed
     */
    public function delete(User $user, OwnerShedule $ownerShedule)
    {
        //
    }

    /**
     * Determine whether the user can restore the owner shedule.
     *
     * @param  \App\User  $user
     * @param  \App\OwnerShedule  $ownerShedule
     * @return mixed
     */
    public function restore(User $user, OwnerShedule $ownerShedule)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the owner shedule.
     *
     * @param  \App\User  $user
     * @param  \App\OwnerShedule  $ownerShedule
     * @return mixed
     */
    public function forceDelete(User $user, OwnerShedule $ownerShedule)
    {
        //
    }
}
