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
        $this->call([
            ContactTypeSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Province::factory(50)->create();
        \App\Models\city::factory(20)->create();
        \App\Models\ServiceC::factory(50)->create();
        \App\Models\Service::factory(20)->create();
        \App\Models\Client::factory(30)->create();        
    }
}
