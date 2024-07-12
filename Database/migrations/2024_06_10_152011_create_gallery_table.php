<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreategalleryTable extends Migration {

	public function up()
	{
		Schema::create('gallery', function(Blueprint $table) {
			$table->increments('id');
			$table->text('img')->nullable();
			$table->string('status')->nullable();
			$table->string('user_add')->nullable();
			$table->string('sorting')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('gallery');
	}
}