<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id();
            $table->string('name_departement');
            $table->text('description_departement');
            $table->date('date_departement');
            $table->string('image');
            $table->integer('épingler');
            $table->boolean('special')->default(false);  
            $table->boolean('carousel')->default(false);  
            $table->boolean('home')->default(false);  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departements');
    }
}
