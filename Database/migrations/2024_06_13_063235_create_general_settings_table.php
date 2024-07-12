<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralSettingsTable extends Migration {

	public function up()
	{
		Schema::create('general_settings', function(Blueprint $table) {
			$table->increments('id');
			$table->text('objectives')->nullable();
			$table->text('about')->nullable();			
			$table->text('mission')->nullable();
			$table->text('vision')->nullable();
			$table->text('address')->nullable();
			$table->text('phone')->nullable();
			$table->text('email')->nullable();
			$table->text('facebook')->nullable();
			$table->text('twitter')->nullable();
			$table->text('instagram')->nullable();
			$table->text('snapchat')->nullable();
			$table->text('linkedIn')->nullable();
			$table->text('whatsApp')->nullable();
			$table->text('tiktok')->nullable();
			$table->text('youtube')->nullable();
			$table->text('user_add')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('general_settings');
	}
}