<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'image_service' => 'http://lorempixel.com/200/200/cats/',
            'monthly_price' => rand(50,500),
            'months_change' => rand(0,12),
            'unique_price' => rand(500,15200),
            'description' => $this->faker->text,
            'subscription'  => rand(0,9),
            'type'  => rand(1,3),
            'servicec_id' => rand(1,50),
        ];
    }
}
