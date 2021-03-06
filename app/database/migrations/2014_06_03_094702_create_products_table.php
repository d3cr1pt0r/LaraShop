<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function($table)
		{
			$table->increments('id');
			$table->integer('category_id');
			$table->integer('code');
			$table->string('name');
			$table->string('description');
			$table->decimal('price', 8, 2);
			$table->integer('stock');
			$table->boolean('active');
			$table->integer('position');
			$table->timestamps();
		});

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
		Schema::drop('products');
		Schema::drop('product_images');
	}

}
