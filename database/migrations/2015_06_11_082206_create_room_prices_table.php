<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_prices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('roomID')->unsigned()->default(0);
			$table->foreign('roomID')->references('id')->on('rooms')->onDelete('cascade');
			$table->bigInteger('price_net')->unsigned()->default(0);
			$table->bigInteger('price_percent')->unsigned()->default(0);
			$table->bigInteger('price_gross')->unsigned()->default(0);
			$table->bigInteger('extra_net')->unsigned()->default(0);
			$table->bigInteger('extra_percent')->unsigned()->default(0);
			$table->bigInteger('extra_gross')->unsigned()->default(0);
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
		Schema::drop('room_prices');
	}

}
