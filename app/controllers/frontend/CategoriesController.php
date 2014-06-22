<?php namespace Shop;
use Controller, View;

class CategoriesController extends Controller {

	public function getIndex()
	{
		$view = View::make('frontend.categories.index');
		$view->title = 'LaraShop - Categories';
		return $view;
	}
	
}