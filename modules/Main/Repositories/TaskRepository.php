<?php

namespace Modules\Main\Repositories;

use Modules\Main\Entities\Task;
use Modules\Users\Entities\User;

class TaskRepository
{
    private $paginate_size = 5;

    /**
     * @param User $user
     * @param int|null $category
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Task[]
     */
    public function tasks(User $user, int $category = null)
    {
        $query = Task::with([
            'user',
            'category'
        ])->where('user_id', $user->id)->latest();

        return $category
            ? $query->where('category_id', $category)->paginate($this->paginate_size)
            : $query->paginate($this->paginate_size);
    }

    /**
     * @param Task $task
     * @param array $data
     * @return bool
     */
    public function update(Task $task, array $data)
    {
        foreach($data as $key => $value){
            if(!is_null($value)) $this->{$key} = $value;
        }
        return $task->update($data);
    }

    /**
     * @param Task $task
     * @param bool $status
     * @return bool
     */
    public function updateStatus(Task $task, $status)
    {
        return $task->update(['status' => $status]);
    }

    /**
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function store(User $user, array $data)
    {
        $task = $user->tasks()->create($data);
        return $task;
    }

    /**
     * @param Task $task
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Task $task)
    {
        return $task->delete();
    }

}