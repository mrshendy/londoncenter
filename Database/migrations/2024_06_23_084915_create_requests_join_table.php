<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestsJoinTable extends Migration {

	public function up()
	{
		Schema::create('requests_join', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name')->nullable();
			$table->text('phone')->nullable();
			$table->text('email')->nullable();
			$table->text('notes')->nullable();
			$table->text('id_courses_details')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('requests_join');
	}
}