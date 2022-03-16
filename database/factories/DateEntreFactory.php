<?php

namespace Database\Factories;
use App\Models\Pere;
use App\Models\DateEntre;
use Illuminate\Database\Eloquent\Factories\Factory;

class DateEntreFactory extends Factory
{
    protected $model = DateEntre::class;

    public function definition(): array
    { 
    	return [
    	    'date_E' =>date('Y-m-d H:i:s'),
            'parent_id' =>Pere::inRandomOrder()->first()->id,
    	];
    }
}
