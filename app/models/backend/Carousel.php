<?php namespace Admin;
use Eloquent, File;

class Carousel extends BaseModel {

	protected $table = 'carousel';

	public function images()
	{
		return $this->hasMany('Admin\CarouselImages', 'carousel_id')->orderBy('position', 'asc');
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