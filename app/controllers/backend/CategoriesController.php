<?php namespace Admin;
use Controller, View, Auth, Input, Session, Redirect;

class CategoriesController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex()
	{
		$data['title'] = 'Categories | edit';
		$data['panel_title'] = 'Categories';
		$data['categories'] = Categories::getAllCategories();

		return View::make('backend.categories.index', $data);
	}

}