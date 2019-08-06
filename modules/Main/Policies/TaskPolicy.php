<?php

namespace Modules\Main\Policies;

use App\Policies\Policyable;
use Modules\Main\Entities\Task;
use Modules\Users\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization, Policyable;

    /**
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function manage(User $user, Task $task)
    {
        return $task->user_id === $user->id || $this->is_editor($user);
    }
}
