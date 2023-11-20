<?php

namespace Tests\Feature\API;
use App\Models\toolsModel;
use App\Models\User;
use Database\Factories\toolsModelFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class ToolsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    protected $token;

    public function test_tools_get_endpoint()
    {
        //createOne ? factory(1) ?
        $registro = toolsModel::factory(1)->createOne();

        $user = User::factory(1)->createOne();
        
        
        
        $response = $this->getJson('/api/tools/' . $registro->id);
        dd($response);

        $registro->assertStatus(200);

        $response->assertJsonCount(1);  

        $response->assertJson(function(AssertableJson $json) use($registro){
            $json->hasAll(['title','description','link','created_at','updated_at']);

            $json->whereAllType([
                '0.title'=>'string',
                '0.description'=>'string',
                '0.link'=>'string',
            ]);
        });
    }
}
