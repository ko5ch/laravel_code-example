<?php

namespace Modules\Users\Observers;

use Modules\Users\Entities\User;

class UserObserver
{

    /**
     * Handle the User "creating" event.
     *
     * @param  User $user
     * @return void
     */
    public function creating(User $user)
    {
        //
    }

    /**
     * Handle the User "created" event.
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

}