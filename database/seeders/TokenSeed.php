<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'name' => 'Laravel Personal Access Client',
            'secret' => '7YbzFqpkrFv1fbueyF9lj4paORu9W94JQXGUwwRb',
            'redirect' => 'http://localhost',
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0
        ]);
        DB::table('oauth_clients')->insert([
            'name' => 'Laravel Password Grant Client',
            'secret' => 'PH4XLoLynAuvPCqU5SIlnm8OhDChsxExPWu9aML0',
            'provider' => 'users',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0
        ]);

    }
}
