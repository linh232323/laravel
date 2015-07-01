<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('quantity')->unsigned()->default(1);
			$table->integer('minimum')->unsigned()->default(1);
			$table->integer('maxadults')->unsigned()->default(1);
			$table->integer('stock_status_id')->unsigned()->default(1);
			$table->integer('viewed')->unsigned()->default(0);
			$table->string('image',255);
			$table->date('date_available');
			$table->integer('sort_order')->unsigned()->default(1);
			$table->integer('userID')->unsigned()->default(0);
			$table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
			$table->integer('usergroupID')->unsigned()->default(0);
			$table->foreign('usergroupID')->references('id')->on('user_groups')->onDelete('cascade');
			$table->integer('hotelID')->unsigned()->default(0);
			$table->foreign('hotelID')->references('id')->on('hotels')->onDelete('cascade');
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
		Schema::drop('rooms');
	}

}
