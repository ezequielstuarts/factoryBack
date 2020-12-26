<?php

namespace Database\Factories;

use App\Models\Servicec;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicecFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servicec::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase,
            'image' => 'http://lorempixel.com/200/200/cats/',
            'description' => $this->faker->text,
            'title' => $this->faker->text,
            'subtitle' => $this->faker->text,
            'descriptiontitle' => $this->faker->text,
            'hidden' => rand(0,1),
        ];
    }
}