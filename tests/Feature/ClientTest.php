<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Client;
use App\Models\Province;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Faker;
class ClientTest extends TestCase
{

    /**
     * Get clients - Fail
     *
     * @return void
     */
    public function testGetClientsFail()
    {
        $response = $this->get('/api/client');

        $response->assertStatus(401);
    }

    /**
     * Get clients - Success
     *
     * @return void
     */
    public function testGetClientsSuccess()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );
        $response = $this->get('/api/client');

        $response->assertStatus(200);
    }

    /**
     * Get client - Fail
     *
     * @return void
     */
    public function testGetClientFail()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );
        $response = $this->get('/api/client/125');

        $response->assertStatus(404);
    }

    /**
     * Get client - Success
     *
     * @return void
     */
    public function testGetClientSuccess()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );
        $faker = Faker\Factory::create();
        $user = User::factory()->create(['password' => bcrypt('test')]);
        $province = Province::create(['name' => 'Province Test']);
        $city = City::create(['name' => 'City Test', 'province_id' => $province->id]);
        $client = Client::create([
            'user_id' => $user->id,
            'name' => $faker->name,
            'last_name' => $faker->lastname,
            'address' => $faker->text,
            'phone1' => $faker->phonenumber,
            'email' => $faker->email,
            'dni' => rand(1, 1000000),
            'cuit' => rand(1, 1000000),
            'city_id' => $city->id,
            'gender' => 'Masculino',
            'ranking' => rand(1, 1000000),
            'created_by' => $user->id,
            'modified_by' => $user->id
        ]);
        $response = $this->get('/api/client/1');

        $response->assertStatus(200);
    }

    /**
     * Update client - Fail
     *
     * @return void
     */
    public function testUpdateClientFail()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );
        $faker = Faker\Factory::create();
        $user = User::factory()->create(['password' => bcrypt('test')]);
        $province = Province::create(['name' => 'Province Test']);
        $city = City::create(['name' => 'City Test', 'province_id' => $province->id]);
        $client = Client::create([
            'user_id' => $user->id,
            'name' => $faker->name,
            'last_name' => $faker->lastname,
            'address' => $faker->text,
            'phone1' => $faker->phonenumber,
            'email' => $faker->email,
            'dni' => rand(1, 1000000),
            'cuit' => rand(1, 1000000),
            'city_id' => $city->id,
            'gender' => 'Masculino',
            'ranking' => rand(1, 1000000),
            'created_by' => $user->id,
            'modified_by' => $user->id
        ]);
        $response = $this->put("/api/client/$client->id", ['email' => $client->email]);

        $response->assertStatus(422);
    }

    /**
     * Update client - Success
     *
     * @return void
     */
    public function testUpdateClientSuccess()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );

        $faker = Faker\Factory::create();        $user = User::factory()->create(['password' => bcrypt('test')]);
        $province = Province::create(['name' => 'Province Test']);
        $city = City::create(['name' => 'City Test', 'province_id' => $province->id]);
        $client = Client::create([
            'user_id' => $user->id,
            'name' => $faker->name,
            'last_name' => $faker->lastname,
            'address' => $faker->text,
            'phone1' => $faker->phonenumber,
            'email' => $faker->email,
            'dni' => rand(1, 1000000),
            'cuit' => rand(1, 1000000),
            'city_id' => $city->id,
            'gender' => 'Masculino',
            'ranking' => rand(1, 1000000),
            'created_by' => $user->id,
            'modified_by' => $user->id
        ]);

        $response = $this->put("/api/client/$client->id", ['email' => $faker->email]);

        $response->assertStatus(200);
    }

    /**
     * Delete client - Fail
     *
     * @return void
     */
    public function testDeleteClientFail()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );
        $response = $this->delete("/api/client/112312");

        $response->assertStatus(404);
    }

    /**
     * Delete clients - Success
     *
     * @return void
     */
    public function testDeleteClientSuccess()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );

        $faker = Faker\Factory::create();
        $user = User::factory()->create(['password' => bcrypt('test')]);
        $province = Province::create(['name' => 'Province Test']);
        $city = City::create(['name' => 'City Test', 'province_id' => $province->id]);
        $client = Client::create([
            'user_id' => $user->id,
            'name' => $faker->name,
            'last_name' => $faker->lastname,
            'address' => $faker->text,
            'phone1' => $faker->phonenumber,
            'email' => $faker->email,
            'dni' => rand(1, 1000000),
            'cuit' => rand(1, 1000000),
            'city_id' => $city->id,
            'gender' => 'Masculino',
            'ranking' => rand(1, 1000000),
            'created_by' => $user->id,
            'modified_by' => $user->id
        ]);

        $response = $this->delete("/api/client/$client->id");

        $response->assertStatus(204);
    }

}
