<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('movie_id');
			$table->unsignedInteger('studio_id');
			$table->datetime('start');
			$table->datetime('end');
			$table->decimal('price');
            $table->timestamps();
			
			$table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
			$table->foreign('studio_id')->references('id')->on('studios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
