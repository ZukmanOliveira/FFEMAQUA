<?php

namespace Database\Seeders;

use App\Models\tagsModel;
use Illuminate\Database\Seeder;
use App\Models\toolsModel;
use App\Models\tags_model_tools_model;

class ToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        toolsModel::factory(5)->create();
        tagsModel::factory(5)->create();
    }
}