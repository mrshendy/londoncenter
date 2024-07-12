<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->text('id_sections')->nullable();
			$table->text('name')->nullable();
			$table->text('place')->nullable();
			$table->text('date')->nullable();
			$table->text('duration')->nullable();
			$table->text('introduction')->nullable();
			$table->text('course_content')->nullable();
			$table->text('price')->nullable();
			$table->text('img')->nullable();
			$table->text('file')->nullable();
			$table->text('sorting')->nullable();
			$table->text('status')->nullable();
			$table->text('user_add')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}