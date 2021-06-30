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
            'address'=> Str::random(10),
            'postcode'=> Str::random(5),
            'city'=> Str::random(10),
            'country'=> Str::random(10),
            'oib'=> Str::random(11),
        ];
    }
}
