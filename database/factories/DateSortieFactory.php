<?php

namespace Database\Factories;
use App\Models\Pere;
use App\Models\DateSortie;
use Illuminate\Database\Eloquent\Factories\Factory;

class DateSortieFactory extends Factory
{
    protected $model = DateSortie::class;

    public function definition(): array
    {
    	return [
            'date_S' =>date('Y-m-d H:i:s'),
            'parent_id' =>Pere::inRandomOrder()->first()->id,
           
    	];
    }
}
