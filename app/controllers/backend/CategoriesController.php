<?php namespace Admin;
use Controller, View, Auth, Input, Session, Redirect;

class CategoriesController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex()
	{
		$data['title'] = 'Categories';
		$data['panel_title'] = 'Categories';
		$data['categories'] = Categories::getAllCategories();

		return View::make('backend.categories.index', $data);
	}

	public function getAdd()
	{
		$data['title'] = 'Categories | Add';
		$data['panel_title'] = 'Categories - Add';
		$data['categories'] = Categories::all();

		return View::make('backend.categories.add', $data);
	}

	public function postAdd()
	{
		$category = new Categories();
		$category->name = Input::get('name');
		$category->parent_id = Input::get('parent');
		$category->active = Input::get('active');
		$category->save();

		Session::flash('alert', array('type' => "success", 'messages' => array('Category '.$category->name.' added!')));
		return Redirect::to('admin/categories');
	}

	public function getEdit($id)
	{
		$data['title'] = 'Categories | Edit';
		$data['panel_title'] = 'Categories - Edit';
		$data['categories'] = Categories::all();
		$data['category'] = Categories::find($id);

		return View::make('backend.categories.edit', $data);
	}

	public function postEdit($id)
	{
		$category = Categories::find($id);
		$category->name = Input::get('name');
		$category->parent_id = Input::get('parent');
		$category->active = Input::get('active');
		$category->save();

		Session::flash('alert', array('type' => "success", 'messages' => array('Category '.$category->name.' updated!')));
		return Redirect::to('admin/categories');
	}

	public function getDelete($id)
	{
		$category = Categories::find($id);
		$category->delete();

		Session::flash('alert', array('type' => "success", 'messages' => array('Category '.$category->name.' deleted!')));
		return Redirect::to('admin/categories');
	}

	public function getMoveup($id)
	{
		Categories::moveUp($id);
		return Redirect::to('admin/categories');
	}

	public function getMovedown($id)
	{
		Categories::moveDown($id);
		return Redirect::to('admin/categories');
	}

	public function getToggleactive($id)
	{
		$category = Categories::find($id);
		$category->active = !$category->active;
		$category->save();

		return Redirect::to('admin/categories');
	}

}