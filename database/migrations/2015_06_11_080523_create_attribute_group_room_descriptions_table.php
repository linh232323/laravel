<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeGroupRoomDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_group_room_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('attributegroupID')->unsigned()->default(0);
			$table->foreign('attributegroupID')->references('id')->on('attribute_group_rooms')->onDelete('cascade');
			$table->integer('languageID')->unsigned()->default(1);
			$table->foreign('languageID')->references('id')->on('languages')->onDelete('cascade');
			$table->string('name',255);
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
		Schema::drop('attribute_group_room_descriptions');
	}

}
