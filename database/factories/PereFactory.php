<?php

namespace Database\Factories;

use App\Models\Pere;
use Illuminate\Database\Eloquent\Factories\Factory;

class PereFactory extends Factory
{
    protected $model = Pere::class;
 
    public function definition(): array
    {
    	return [
            'name' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'email' => $this->faker->email(),
            'img' => $this->faker->image(),
    	];
    }
}
