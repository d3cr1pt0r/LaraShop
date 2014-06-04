<?php namespace Admin;
use Eloquent;

class Products extends BaseModel {

	protected $table = 'products';

	public function categories()
	{
		return $this->hasMany('Admin\Categories', 'category_id');
	}

	public function images()
	{
		return $this->hasMany('Admin\ProductImages', 'product_id');
	}

}