<?php namespace Shop;
use Controller, View;

class HomeController extends Controller {

	public function getIndex()
	{
		$view = View::make('frontend.home.index');
		$view->title = 'LaraShop - Home';
		return $view;
	}
	
}