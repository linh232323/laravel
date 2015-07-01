<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTransportersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_transporters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tour_id')->unsigned()->default(0);
			$table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
			$table->integer('transporter_id')->unsigned()->default(0);
			$table->foreign('transporter_id')->references('id')->on('transporters')->onDelete('cascade');
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
		Schema::drop('tour_transporters');
	}

}
