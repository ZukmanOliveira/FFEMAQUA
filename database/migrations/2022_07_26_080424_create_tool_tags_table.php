<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_model_tools_model', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tags_model_id')->nullable();
            $table->unsignedBigInteger('tools_model_id')->nullable();
            
            $table->foreign('tools_model_id')->references('id')->on('toolsModel');
            $table->foreign('tags_model_id')->references('id')->on('tagsModel');
   
            $table->timestamps();
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagsModeltoolsModel');
    }
};
