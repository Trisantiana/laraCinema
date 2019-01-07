<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->unsignedInteger('branch_id');
			$table->decimal('basic_price');
			$table->decimal('additional_friday_price');
			$table->decimal('additional_saturday_price');
			$table->decimal('additional_sunday_price');
            $table->timestamps();
			
			 $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studios');
    }
}
