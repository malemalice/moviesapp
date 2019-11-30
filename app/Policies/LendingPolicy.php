<?php

namespace App\Policies;

use App\User;
use App\Models\Lending;
use Illuminate\Auth\Access\HandlesAuthorization;

class LendingPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can manage records.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function manage(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can list models.
     *
     * @param  User $user
     * @return mixed
     */
    public function viewList(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the record.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Lending  $record
     * @return mixed
     */
    public function view(User $user, Lending $record)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create records.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the record.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Lending  $record
     * @return mixed
     */
    public function update(User $user, Lending $record)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the record.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Lending  $record
     * @return mixed
     */
    public function delete(User $user, Lending $record)
    {
        return $user->isAdmin();
    }
}
