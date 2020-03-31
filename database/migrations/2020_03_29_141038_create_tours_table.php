<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->bigInteger('destination_id');
            $table->string('tour_name');
            $table->string('start_at');
            $table->bigInteger('category_id');
            $table->bigInteger('price');
            $table->integer('num_of_per');
            $table->integer('num_of_day');
            $table->tinyInteger('status');
            $table->float('discount');
            $table->text('description');
            $table->string('vehicle');
            $table->string('schedule');
            $table->dateTime('time_start');
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
        Schema::dropIfExists('tours');
    }
}
