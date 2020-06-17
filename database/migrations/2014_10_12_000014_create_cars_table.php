<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('body_type_id');
            $table->unsignedInteger('drive_type_id');
            $table->unsignedInteger('fuel_type_id');
            $table->boolean('with_driver');
            $table->string('name');
            $table->integer('seat_count');
            $table->double('avg_fuel_consumption');
            $table->integer('engine_volume');
            $table->integer('year');
            $table->integer('min_cost');
            
            $table->timestamps();
               
            $table->foreign('class_id')
                  ->references('id')
                  ->on('car_classes')
                  ->onDelete('cascade');
               
            $table->foreign('body_type_id')
                  ->references('id')
                  ->on('car_body_types')
                  ->onDelete('cascade');
               
            $table->foreign('drive_type_id')
                  ->references('id')
                  ->on('car_drive_types')
                  ->onDelete('cascade');
               
            $table->foreign('fuel_type_id')
                  ->references('id')
                  ->on('car_fuel_types')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
