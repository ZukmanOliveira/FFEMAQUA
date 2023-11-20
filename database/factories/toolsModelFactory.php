<?php

namespace Database\Factories;

use App\Models\toolsModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class toolsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description'=> $this->faker->text,
            'link' => $this->faker->unique()->url,
        ];
        
    }
}
