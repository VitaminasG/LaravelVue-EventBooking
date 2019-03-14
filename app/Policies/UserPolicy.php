<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function view(User $user)
    {
	    //
    }
}
