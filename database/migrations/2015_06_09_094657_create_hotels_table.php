<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image',255);
			$table->date('date_available');
			$table->integer('star')->unsigned()->default(1);
			$table->enum('wifi',array('0','1'))->default(0);
			$table->integer('viewed')->unsigned()->default(0);
			$table->string('maps_apil',60);
			$table->string('maps_apir',60);
			$table->integer('sort_order')->unsigned()->default(1);
			$table->integer('userID')->unsigned()->default(0);
			$table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
			$table->integer('usergroupID')->unsigned()->default(0);
			$table->foreign('usergroupID')->references('id')->on('user_groups')->onDelete('cascade');
			$table->enum('status',array('0','1'))->default(0);
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
		Schema::drop('hotels');
	}

}
