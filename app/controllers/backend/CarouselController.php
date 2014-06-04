<?php namespace Admin;
use Controller, View, Auth, Input, File, Session, Redirect, URL;

class CarouselController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex()
	{
		$view = View::make('backend.carousel.index');
		$view->title = 'Carousel';
		$view->panel_title = 'Carousel';
		$view->carousels = Carousel::all();

		return $view;
	}

	public function getAdd()
	{
		$view = View::make('backend.carousel.add');
		$view->title = 'Carousel - Add';
		$view->panel_title = 'Carousel - Add';

		return $view;
	}

	public function postAdd()
	{
		$carousel = new Carousel();
		$carousel->name = Input::get('name');
		$carousel->active = Input::get('active');
		$carousel->position = Carousel::nextPosition();
		$carousel->save();

		if(Input::hasFile('files'))
		{
			$files = Input::file('files');
			$foldername = 'uploads/carousel_images/'.str_random(32).'/';
			foreach($files as $file)
			{
				$filename = str_random(32).'.'.$file->getClientOriginalExtension();
				$file->move($foldername, $filename);

				$carousel_images = new CarouselImages();
				$carousel_images->carousel_id = $carousel->id;
				$carousel_images->folder = $foldername;
				$carousel_images->src = $foldername.$filename;
				$carousel_images->active = '1';
				$carousel_images->position = CarouselImages::nextPosition();
				$carousel_images->save();
			}
		}

		Session::flash('alert', array('type' => "success", 'messages' => array('Carousel '.$carousel->name.' added!')));
		return Redirect::to('admin/carousel');
	}

	public function getEdit($id)
	{
		$view = View::make('backend.carousel.edit');
		$view->title = 'Carousel - Add';
		$view->panel_title = 'Carousel - Add';
		$view->carousel = Carousel::find($id);

		return $view;
	}

	public function postEdit($id)
	{
		$carousel = Carousel::find($id);
		$carousel->name = Input::get('name');
		$carousel->active = Input::get('active');
		$carousel->position = Carousel::nextPosition();
		$carousel->save();

		if(Input::hasFile('files'))
		{
			$files = Input::file('files');
			$foldername = null;

			$carousel_images = Carousel::find($id)->images()->get();
			if(sizeof($carousel_images) > 0)
				$foldername = $carousel_images->toArray()[0]['folder'];
			else
				$foldername = 'uploads/carousel_images/'.str_random(32).'/';

			foreach($files as $file)
			{
				$filename = str_random(32).'.'.$file->getClientOriginalExtension();
				$file->move($foldername, $filename);

				$carousel_images = new CarouselImages();
				$carousel_images->carousel_id = $carousel->id;
				$carousel_images->folder = $foldername;
				$carousel_images->src = $foldername.$filename;
				$carousel_images->active = '1';
				$carousel_images->position = CarouselImages::nextPosition();
				$carousel_images->save();
			}
		}

		Session::flash('alert', array('type' => "success", 'messages' => array('Carousel '.$carousel->name.' updated!')));
		return Redirect::to('admin/carousel');
	}

	public function getDelete($id)
	{
		$carousel = Carousel::find($id);
		$carousel->delete();

		Session::flash('alert', array('type' => "success", 'messages' => array('Carousel '.$carousel->name.' deleted!')));
		return Redirect::to('admin/carousel');
	}

	public function getDeleteimage($id)
	{
		$image = CarouselImages::find($id);
		$image->delete();
		File::delete($image->src);

		Session::flash('alert', array('type' => "success", 'messages' => array('Image deleted!')));
		return Redirect::to(URL::previous());
	}

	public function getMoveup($id)
	{
		Carousel::moveUp($id);
		return Redirect::to('admin/carousel');
	}

	public function getMovedown($id)
	{
		Carousel::moveDown($id);
		return Redirect::to('admin/carousel');
	}

	public function getToggleactive($id)
	{
		Carousel::toggleActive($id);
		return Redirect::to(URL::previous());
	}

	public function getToggleactiveimage($id)
	{
		CarouselImages::toggleActive($id);
		return Redirect::to(URL::previous());
	}

}