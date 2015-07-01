<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',60);
			$table->string('image',255);
			$table->integer('parent_id')->unsigned()->default(0);
			$table->enum('menu',array('0','1'))->default(0);
			$table->enum('column',array('0','1','2'))->default(0);
			$table->smallInteger('typeID')->unsigned()->default(0);
			$table->integer('sort_order')->unsigned()->default(1);
			$table->enum('status',array('0','1'))->default(0);
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
		Schema::drop('categories');
	}

}
