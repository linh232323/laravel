<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned()->default(0);
			$table->integer('attribute_hotel_id')->unsigned()->default(0);
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
			$table->foreign('attribute_hotel_id')->references('id')->on('attribute_hotels')->onDelete('cascade');
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
		Schema::drop('hotel_attributes');
	}

}
