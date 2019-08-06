<?php

namespace Modules\Main\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Modules\Main\Entities\Category;
use Modules\Main\Entities\Task;
use Modules\Users\Entities\User;

class TaskTableSeeder extends Seeder
{
    protected const FAKE_TASKS_NUMBER = 10;

    protected $categories;
    protected $users;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = now();

        Model::unguard();

        $this->command->info('Task Seeder Started:');

        $this->categories = Category::all()->pluck('id');
        $this->users = User::all();

        $this->users->each(function ($user) {
            $this->saveTask($user);
        });

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));
    }

    /**
     * @param User $user
     */
    private function saveTask(User $user)
    {
        foreach (range(1, self::FAKE_TASKS_NUMBER) as $i) {
            factory(Task::class)->create([
                'category_id'   => $this->categories->random(),
                'user_id'       => $user->id,
            ]);
        }
    }
}
