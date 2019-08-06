<?php

namespace Modules\Main\Observers;

use App\Services\Hash\Hasher;
use Modules\Main\Entities\Task;

class TaskObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  Task $task
     * @return void
     */
    public function created(Task $task)
    {
        $task->uid = Hasher::encode($task->id);
        $task->save();
    }
}