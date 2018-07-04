<?php

namespace App\Policies;

use App\User;
use App\Worker;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkerPolicy
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

    public function add(User $user){
        return $user->isAdmin();
    }

    public function show(User $user){
        return $user->isAdmin();
    }

    public function update(User $user){
        return $user->isAdmin();
    }

    public function delete(User $user){
        return $user->isAdmin();
    }
}