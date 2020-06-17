<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->string('original_file_name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('path')->nullable();
            $table->string('thumb_name')->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->unsignedInteger('index')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('images')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('car_id')->references('id')->on('cars')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
