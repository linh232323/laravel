<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_id')->unsigned()->default(0);
			$table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
			$table->integer('attribute_room_id')->unsigned()->default(0);
			$table->foreign('attribute_room_id')->references('id')->on('attribute_rooms')->onDelete('cascade');
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
		Schema::drop('room_attributes');
	}

}
