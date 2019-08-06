<?php

namespace Modules\Main\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Storage;

class MainDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        try {
            $this->flushStorage();
        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
        }

        $this->call(CategoryTableSeeder::class);
        $this->call(TaskTableSeeder::class);
    }

    /**
     * @return bool
     */
    protected function flushStorage()
    {
        return Storage::deleteDirectory('public/uploads');
    }
}
