<?php

use Faker\Generator as Faker;
use \Modules\Users\Entities\User;
use \Modules\Main\Entities\{
    Task, Category
};

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'name'              => $faker->name(),
        'username'          => $faker->unique()->userName,
        'email'             => $faker->unique()->safeEmail,
        'password'          => $password ?: $password = bcrypt('password'),
        'email_token'       => null,
        'active'            => true,
        'remember_token'    => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'  => $faker->randomElement(Category::CATEGORIES)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Task::class, function (Faker $faker) {
    return [
        'status'        => $faker->randomElement([Task::STATUS_UNDONE, Task::STATUS_DONE]),
        'title'         => $faker->sentence(6),
        'description'   => $faker->text(150),
        'category_id'   => optional(Category::inRandomOrder()->first())->id,
    ];
});


