<?php

namespace Modules\Users\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Main\Entities\Task;
use Modules\Users\Entities\User;
use Tests\TestCase;

class UserTaskControllerTest extends TestCase
{
    use WithFaker, DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = $this->getUser();
        $user_task = $this->getTask($user);

        $response = $this->actingAs($user)->call('GET', route('tasks.index'));
        $response->assertViewHas('tasks');

    }

    protected function getUser()
    {
        return factory(User::class)->create();
    }

    protected function getTask(User $user)
    {
        return factory(Task::class)->create([
            'user_id' => $user
        ]);
    }

}
