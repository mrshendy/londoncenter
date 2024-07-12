<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionsTable extends Migration {

	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('img')->nullable();
			$table->string('status')->nullable();
			$table->string('user_add')->nullable();
			$table->string('sorting')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('sections');
	}
}