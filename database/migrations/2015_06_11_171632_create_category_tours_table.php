<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryToursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_tours', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tour_id')->unsigned()->default(0);
			$table->integer('category_id')->unsigned()->default(0);
			$table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
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
		Schema::drop('category_tours');
	}

}
