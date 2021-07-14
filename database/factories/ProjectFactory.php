<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id'=> $this->faker->randomElement(Client::pluck('id')),
            'name'=> $this->faker->words(rand(1, 5), true),
            'description'=> $this->faker->text(200),
            'price'=> $this->faker->randomFloat(2, 10000.01, 99999.99),
            'deployed_at'=> $this->faker->date('Y-m-d', 'now')
        ];
    }
}
