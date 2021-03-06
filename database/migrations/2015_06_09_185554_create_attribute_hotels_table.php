<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_hotels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',255);
			$table->integer('attributegroupID')->unsigned()->default(0);
			$table->foreign('attributegroupID')->references('id')->on('attribute_group_hotels')->onDelete('cascade');
			$table->integer('sort_order')->unsigned()->default(1);
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
		Schema::drop('attribute_hotels');
	}

}
