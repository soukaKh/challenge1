<?php

namespace Database\Factories;

use App\Models\EleveParent;
use App\Models\Eleve;
use App\Models\Pere;
use Illuminate\Database\Eloquent\Factories\Factory;

class EleveParentFactory extends Factory
{
    protected $model = EleveParent::class;

    public function definition(): array
    {
    	return [
            'eleve_id' =>Eleve::inRandomOrder()->first()->id,
            'parent_id' =>Pere::inRandomOrder()->first()->id,
    	];
    }
}
