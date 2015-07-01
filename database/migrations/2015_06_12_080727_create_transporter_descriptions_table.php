<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransporterDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transporter_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',255);
			$table->integer('transporterID')->unsigned()->default(0);
			$table->foreign('transporterID')->references('id')->on('transporters')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(1);
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
		Schema::drop('transporter_descriptions');
	}

}
