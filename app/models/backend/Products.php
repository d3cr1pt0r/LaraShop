<?php namespace Admin;
use Eloquent;

class Products extends Eloquent {

	protected $table = 'products';

	public function categories()
	{
		return $this->hasMany('Admin\Categories', 'category_id');
	}

	public function images()
	{
		return $this->hasMany('Admin\ProductImages', 'product_id');
	}

	public static function moveUp($id)
	{

	}

	public static function moveDown($id)
	{

	}

}