<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotelID')->unsigned()->default(0);
			$table->foreign('hotelID')->references('id')->on('hotels')->onDelete('cascade');
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
		Schema::drop('hotel_images');
	}

}
