<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(User $user)
    {
        return $user->role->id == 4;
    }

    public function update(User $user)
    {
        return $user->role->id == 4;
    }

    public function destroy(User $user){
        return $user->role->id == 4;
    }
}
