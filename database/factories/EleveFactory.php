<?php

namespace Database\Factories;

use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;

class EleveFactory extends Factory
{
    protected $model = Eleve::class;
 
    public function definition(): array
    {
    	return [
            'name' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'date_nais' => $this->faker->date(),
            'code_massar' => $this->faker->sentence(),
            'niveau' => $this->faker->sentence(),
            'img' => $this->faker->image(),
    	];
    }
}
