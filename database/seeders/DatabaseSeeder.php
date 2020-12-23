<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TokenSeed::class,
        ]);
        // \App\Models\User::factory(10)->create();
        \App\Models\ServiceC::factory(10)->create();
        \App\Models\Service::factory(20)->create();
    }
}
