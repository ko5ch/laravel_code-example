<?php

namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Entities\Role;
use Modules\Users\Entities\User;

class UsersTableSeeder extends Seeder
{

    protected $list = [
        [
            'email'         => 'admin@site.com',
            'password'      => 'password',
            'email_token'   => null,
            'roles'         => [Role::TYPE_ADMIN],
            'active'        => true,
        ],
        [
            'email'         => 'user@site.com',
            'password'      => 'password',
            'email_token'   => null,
            'roles'         => [],
            'active'        => true,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = now();

        Model::unguard();

        $this->command->info('User Seeder Started:');

        foreach ($this->list as $item) {
            $item = collect($item);

            $user = factory(User::class)->create($item->only([
                'email_token',
                'password',
                'active',
                'email',
            ])->toArray());

            if (is_a($user, User::class)) {
                /** @var User $user */
                if ($item->get('roles') && count($item->get('roles'))) {
                    $this->attachRoles($user, $item->get('roles'));
                }
            }
        }

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));

    }

    /**
     * @param User $user
     * @param array $roles
     * @return mixed
     */
    protected function attachRoles(User $user, array $roles)
    {
        return $user->attachRoles($roles);
    }
}
