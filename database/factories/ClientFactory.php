<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastname,
            'address' => $this->faker->streetAddress,
            'floor' => rand(1,10),
            'phone1' => $this->faker->phonenumber,
            'phone2' => $this->faker->phonenumber,
            'email' => $this->faker->email,
            'dni' => $this->faker->ean8,
            'cuit' => $this->faker->ean8,
            'city_id' => rand(1,20),
            'gender' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'ranking' => rand(1,100),
            'created_by' => 1,
            'modified_by' => 1
        ];
    }
}
