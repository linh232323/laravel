<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',60);
			$table->string('password',80);
			$table->string('firstname',80);
			$table->string('lastname',80);
			$table->string('email',80);
			$table->string('image',255);
			$table->string('ip',10);
			$table->enum('status',array('0','1'))->default(0);
			$table->string('remember_token',100);
			$table->integer('user_group_id')->unsigned();
			$table->foreign('user_group_id')->references('id')->on('user_groups')->onDelete('cascade');
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
		Schema::drop('users');
	}

}
