<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSAndCTable extends Migration {

	public function up()
	{
		Schema::create('s_and_c', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name');
			$table->longtext('introduction');
			$table->longtext('content');
			$table->text('img');
			$table->text('file');
			$table->text('sorting');
			$table->text('user_add');
			$table->text('status');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('s_and_c');
	}
}