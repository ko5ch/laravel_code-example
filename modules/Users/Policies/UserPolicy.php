<?php

namespace Modules\Users\Policies;

use App\Policies\Policyable;
use Modules\Users\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
	use HandlesAuthorization, Policyable;

    /**
     * @param User $current
     * @param User $user
     * @return bool
     */
    public function show(User $current, User $user)
    {
        return $this->manage($current, $user);
    }

    /**
     * @param User $current
     * @param User $user
     * @return bool
     */
    public function manage(User $current, User $user)
    {
        return $this->is($current, $user) || $this->is_editor($current);
    }

    /**
     * @param User $user
     * @return bool|mixed
     */
    public function admin(User $user)
    {
        return $user->is_editor;
    }

    /**
     * @param User $current
     * @param User $user
     * @return bool
     */
    protected function is(User $current, User $user)
    {
        return $user->is($current);
    }
}
