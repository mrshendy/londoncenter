<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaTable extends Migration {

	public function up()
	{
		Schema::create('area', function(Blueprint $table) {
			$table->id();
            $table->unsignedBigInteger('id_country');
            $table->foreign('id_country')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('id_government');
            $table->foreign('id_government')->references('id')->on('government')->onDelete('cascade');
		    $table->unsignedBigInteger('id_city');
            $table->foreign('id_city')->references('id')->on('city')->onDelete('cascade');
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
		Schema::drop('area');
	}
}