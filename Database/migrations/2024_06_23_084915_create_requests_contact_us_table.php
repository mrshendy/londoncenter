<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestsContactUsTable extends Migration {

	public function up()
	{
		Schema::create('requests_contact_us', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name')->nullable();
			$table->text('phone')->nullable();
			$table->text('email')->nullable();
			$table->text('address')->nullable();
			$table->text('massege')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('requests_contact_us');
	}
}