<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('roomID')->unsigned()->default(0);
			$table->foreign('roomID')->references('id')->on('rooms')->onDelete('cascade');
			$table->string('image',255);
			$table->integer('sort_order')->unsigned()->default(0);
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
		Schema::drop('room_images');
	}

}
