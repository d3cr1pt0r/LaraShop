<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselTable extends Migration {

	public function up()
	{
		Schema::create('carousel', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->boolean('active');
			$table->integer('position');
			$table->timestamps();
		});

		Schema::create('carousel_images', function($table)
		{
			$table->increments('id');
			$table->integer('carousel_id');
			$table->string('folder');
			$table->string('src');
			$table->boolean('active');
			$table->integer('position');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('carousel');
		Schema::drop('carousel_images');
	}

}
