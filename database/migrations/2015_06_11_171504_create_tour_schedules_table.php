<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_schedules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('transporter')->unsigned()->default(0);
			$table->smallInteger('serial')->unsigned()->default(0);
			$table->string('title');
			$table->text('text');
			$table->integer('tourID')->unsigned()->default(0);
			$table->foreign('tourID')->references('id')->on('tours')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(0);
			$table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
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
		Schema::drop('tour_schedules');
	}

}
