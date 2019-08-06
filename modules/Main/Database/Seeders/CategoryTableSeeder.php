<?php

namespace Modules\Main\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Main\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = now();

        Model::unguard();

        $this->command->info('Category Seeder Started:');

        $items = collect(Category::CATEGORIES);
        $items->each(function ($item) {
            factory(Category::class)->create(['name' => $item]);
        });

        $this->command->info('Time completed:   '.$start->diffForHumans(null, true));
    }
}
