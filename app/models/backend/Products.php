<?php namespace Admin;
use Eloquent;

class Products extends Eloquent {

	protected $table = 'products';

	public function categories()
	{
		return $this->hasMany('Categories', 'category_id');
	}

	public static function moveUp($id)
	{

	}

	public static function moveDown($id)
	{

	}

}