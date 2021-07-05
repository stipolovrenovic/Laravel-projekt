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
            'postcode'=> $this->faker->randomNumber(5, true),
            'city'=> $this->faker->city(),
            'country'=> $this->faker->country(),
            'oib'=> $this->faker->randomNumber(11, true),
        ];
    }
}
