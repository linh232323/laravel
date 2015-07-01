<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotelID')->unsigned()->default(0);
			$table->foreign('hotelID')->references('id')->on('hotels')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(0);
			$table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
			$table->string('name',100);
			$table->string('address',255);
			$table->text('description');
			$table->text('short_description');
			$table->text('tag');
			$table->string('meta_title');
			$table->string('meta_description');
			$table->string('meta_keyword');
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
		Schema::drop('hotel_descriptions');
	}

}
