<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_types')->insert([
            'name' => 'Instagram',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Facebook',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Youtube',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Web',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Web Empresa',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Google',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Telefono',
        ]);
        DB::table('contact_types')->insert([
            'name' => 'Otro',
        ]);
    }
}
