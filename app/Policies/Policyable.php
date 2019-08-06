<?php

namespace App\Policies;

use Modules\Users\Entities\Role;
use Modules\Users\Entities\User;

trait Policyable
{
    /**
     * @param User $user
     * @return bool
     */
    protected function is_editor(User $user)
    {
        return $user->roles->contains(Role::TYPE_ADMIN);
    }
}