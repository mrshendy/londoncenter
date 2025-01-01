<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSAndCDTable extends Migration {

	public function up()
	{
		Schema::create('s_and_c_d', function(Blueprint $table) {
			$table->increments('id');
			$table->text('date');
			$table->text('status');
			$table->text('user_add');
			$table->text('duration');
			$table->unsignedInteger('s_and_c_id')->nullable();
            $table->unsignedInteger('place_id')->nullable();
            $table->foreign('s_and_c_id')->references('id')->on('s_and_c')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('place')->onDelete('cascade');
		    $table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('s_and_c_d');
	}
}