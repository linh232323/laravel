<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tourID')->unsigned()->default(0);
			$table->foreign('tourID')->references('id')->on('tours')->onDelete('cascade');
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
		Schema::drop('tour_images');
	}

}
