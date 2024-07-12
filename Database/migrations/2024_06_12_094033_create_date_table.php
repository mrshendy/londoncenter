<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDateTable extends Migration {

	public function up()
	{
		Schema::create('date', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('status')->nullable();
			$table->string('user_add')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('date');
	}
}