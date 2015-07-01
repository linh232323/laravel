<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('adult')->unsigned()->default(0);
			$table->integer('child')->unsigned()->default(0);
			$table->integer('baby')->unsigned()->default(0);
			$table->integer('minimum')->unsigned()->default(1);
			$table->integer('stock_status_id')->unsigned()->default(1);
			$table->string('image',255);
			$table->date('date_available');
			$table->date('departure_time');
			$table->integer('viewed')->unsigned()->default(0);
			$table->integer('days')->unsigned()->default(0);
			$table->integer('nights')->unsigned()->default(0);
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
		Schema::drop('tours');
	}

}
