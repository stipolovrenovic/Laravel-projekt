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
            'postcode'=> rand(10000, 99999),
            'city'=> $this->faker->city(),
            'country'=> $this->faker->country(),
            'oib'=> rand(10000000000, 99999999999),
        ];
    }
}
