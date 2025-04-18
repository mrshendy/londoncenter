<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernmentTable extends Migration {

	public function up()
	{
		Schema::create('government', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->unsignedBigInteger('id_country');
            $table->foreign('id_country')->references('id')->on('countries')->onDelete('cascade');
			$table->text('name');
			$table->text('notes')->nullable();
			$table->string('user_add', 30);
			$table->string('account_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('government');
	}
}
