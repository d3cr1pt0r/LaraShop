<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('surname');
			$table->string('email');
			$table->string('password');
			$table->string('type');
			$table->string('remember_token');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}
