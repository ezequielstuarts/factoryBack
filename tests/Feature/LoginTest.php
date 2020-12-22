<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFailedLogin()
    {
        $user = User::factory()->create(['password' => bcrypt('test')]);

        $response = $this->post('/api/login', ['email' => $user->email, 'password' => 'testing']);

        $response->assertStatus(401);
    }

    public function testSuccessLogin()
    {
        $user = User::factory()->create(['password' => bcrypt('test')]);

        $response = $this->post('/api/login', ['email' => $user->email, 'password' => 'test']);

        $response->assertStatus(200);
    }

    public function testUserLoggedMiddleware()
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );

        $response = $this->post('/api/details');

        $response->assertStatus(200);
    }
}
