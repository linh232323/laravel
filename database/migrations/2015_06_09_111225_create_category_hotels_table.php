<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_hotels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned()->default(0);
			$table->integer('category_id')->unsigned()->default(0);
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
		Schema::drop('category_hotels');
	}

}
