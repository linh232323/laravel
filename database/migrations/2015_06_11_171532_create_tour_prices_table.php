<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_adults', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tourID')->unsigned()->default(0);
			$table->foreign('tourID')->references('id')->on('tours')->onDelete('cascade');
			$table->bigInteger('adult_net')->unsigned()->default(0);
			$table->bigInteger('adult_percent')->unsigned()->default(0);
			$table->bigInteger('adult_gross')->unsigned()->default(0);
			$table->bigInteger('child_net')->unsigned()->default(0);
			$table->bigInteger('child_percent')->unsigned()->default(0);
			$table->bigInteger('child_gross')->unsigned()->default(0);
			$table->bigInteger('baby_net')->unsigned()->default(0);
			$table->bigInteger('baby_percent')->unsigned()->default(0);
			$table->bigInteger('baby_gross')->unsigned()->default(0);
			$table->bigInteger('discount')->unsigned()->default(0);
			$table->date('date_form');
			$table->date('date_to');
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
		Schema::drop('tour_adults');
	}

}
