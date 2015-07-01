<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tourID')->unsigned()->default(0);
			$table->foreign('tourID')->references('id')->on('tours')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(0);
			$table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
			$table->string('name',100);
			$table->text('description');
			$table->text('information');
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
		Schema::drop('tour_descriptions');
	}

}
