<?php

namespace gkinder\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use gkinder\School;
use gkinder\User;

class SchoolPolicy
{
    use HandlesAuthorization;

    public function pass(User $user, School $school)
    {
        return $user->school_id === $school->id;
    }

}
