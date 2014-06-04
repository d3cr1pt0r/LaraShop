<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration {

	public function up()
	{
		Schema::create('product_images', function($table)
		{
			$table->increments('id');
			$table->integer('product_id');
			$table->string('folder');
			$table->string('src');
			$table->boolean('active');
			$table->integer('position');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_images');
	}

}
