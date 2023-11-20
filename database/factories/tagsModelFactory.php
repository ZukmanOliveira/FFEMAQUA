<?php

namespace Database\Factories;

use App\Models\tagsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tagsModel>
 */
class tagsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tags_model_id' => tagsModel::factory(),
            'tags' => $this->faker->unique()->name
        ];
    }
}
