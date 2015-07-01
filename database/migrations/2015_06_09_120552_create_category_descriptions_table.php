<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('categoryID')->unsigned()->default(0);
			$table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(0);
			$table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
			$table->string('name',60);
			$table->string('meta_title',60);
			$table->string('meta_keyword',60);
			$table->text('meta_description');
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
		Schema::drop('category_descriptions');
	}

}
