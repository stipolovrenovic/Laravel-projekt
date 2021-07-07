<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name'=> $this->faker->name(),
            'address'=> $this->faker->address(),
            'postcode'=>  $this->faker->randomFloat(0, 10000, 99999),
            'city'=> $this->faker->city(),
            'country'=> $this->faker->country(),
            'oib'=>  $this->faker->randomFloat(0, 10000000000, 99999999999),
            'type'=> $this->faker->randomFloat(0, 1, 2),
            'international'=> $this->faker->randomFloat(0, 1, 2),
            'email'=> $this->faker->email(),
            'services'=> Str::random(15),
            'active'=> $this->faker->boolean()
        ];
    }
}
