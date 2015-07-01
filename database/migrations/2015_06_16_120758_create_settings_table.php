<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',60);
			$table->string('address',255);
			$table->string('image',255);
			$table->string('logo',255);
			$table->string('icon',255);
			$table->string('fax',60);
			$table->string('telephone',60);
			$table->integer('zone_id')->unsigned()->default(0);
			$table->string('protocol',255);
			$table->string('smtp_hostname',255);
			$table->string('smtp_username',255);
			$table->string('smtp_password',255);
			$table->string('smtp_port',255);
			$table->string('smtp_timeout',255);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
