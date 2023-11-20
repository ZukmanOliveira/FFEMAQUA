<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\toolsController;
use App\Models\toolsModel;

return new class extends Migration
{
    public function up()
    {
        Schema::create('toolsModel', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('link');
            
          
           // $table->text('tag');
          ///$table->string('tags');
            $table->timestamps();
        });


     
    }

    
    
    public function down()
    {
        
    
        Schema::dropIfExists('toolsModel');
    }
    
};
