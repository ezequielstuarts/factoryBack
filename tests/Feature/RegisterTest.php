<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFailedRegister()
    {
        $user = User::factory()->create(['password' => bcrypt('test')])->toArray();

        $response = $this->post('/api/register', $user);

        $response->assertStatus(401);
    }

    public function testSuccessRegister()
    {
        $test = User::factory()->makeOne(['password' => 'test']);
        $user =  ['name' => $test->name, 'email' => $test->email, 'password' => 'test', 'password_confirmation' => 'test'];
        $response = $this->post('/api/register', $user);

        $response->assertStatus(200);
    }
}
