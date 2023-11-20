<?php

namespace Database\Factories;

use App\Models\tagsModel;
use App\Models\toolsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToolsTags>
 */
class tags_model_tools_modelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'tools_model_id' => function () {
                return factory(toolsModel::class)->create()->id;
            },

            'tags_model_id' => function () {
                return factory(tagsModel::class)->create()->id;
            },
        ];

    }
}
