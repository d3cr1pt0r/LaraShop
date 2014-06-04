<?php namespace Admin;
use Eloquent, File;

class Products extends BaseModel {

	protected $table = 'products';

	public function categories()
	{
		return $this->hasMany('Admin\Categories', 'category_id');
	}

	public function images()
	{
		return $this->hasMany('Admin\ProductImages', 'product_id')->orderBy('position', 'asc');
	}

	public function delete()
	{
		$images = $this->images()->get();

		if(sizeof($images) != 0)
		{
			$folder = $images->first()->folder;
			File::deleteDirectory($folder);
			foreach($images as $image)
				$image->delete();
		}
		return parent::delete();
	}

}