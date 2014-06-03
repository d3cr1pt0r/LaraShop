<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function($table)
		{
			$table->increments('id');
			$table->integer('parent_id');
			$table->string('name');
			$table->boolean('active');
			$table->integer('position');
			$table->integer('level');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}

}
