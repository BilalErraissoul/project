<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name_event'); // Changed from 'name' to 'name_event'
            $table->text('description_event'); // Changed from 'detail' to 'description_event'
            $table->date('date_event'); // Added 'date_event' column
            $table->string('image'); // Moved 'image' column after 'date_event'
            $table->integer('épingler');  
            $table->boolean('special')->default(false);  
            $table->boolean('carousel')->default(false);  
            $table->boolean('home')->default(false);  
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
