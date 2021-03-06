<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeHotelDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_hotel_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('attributeID')->unsigned()->default(0);
			$table->foreign('attributeID')->references('id')->on('attribute_hotels')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(1);
			$table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
			$table->string('name',255);
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
		Schema::drop('attribute_hotel_descriptions');
	}

}
