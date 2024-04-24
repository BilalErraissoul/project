<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('date');
            $table->string('image')->nullable(); // Nullable since we're allowing PDF files
            $table->string('pdf')->nullable(); // New column for storing PDF files 
            $table->boolean('special')->default(false);  
            $table->boolean('carousel')->default(false);  
            $table->boolean('home')->default(false);  
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}    
