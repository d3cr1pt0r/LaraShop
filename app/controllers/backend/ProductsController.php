<?php namespace Admin;
use Controller, View, Auth, Input, Session, Redirect;

class ProductsController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex()
	{
		$data['title'] = 'Products';
		$data['panel_title'] = 'Products';
		$data['products'] = Products::all();

		return View::make('backend.products.index', $data);
	}

	public function getAdd()
	{
		$data['title'] = 'Products - Add';
		$data['panel_title'] = 'Products - Add';
		$data['categories'] = Categories::getAllCategories();

		return View::make('backend.products.add', $data);
	}

	public function postAdd()
	{
		$product = new Products();
		$product->name = Input::get('name');
		$product->description = Input::get('description');
		$product->price = Input::get('price');
		$product->code = Input::get('code');
		$product->stock = Input::get('stock');
		$product->active = Input::get('active');
		$product->category_id = Input::get('category');
		$product->save();

		Session::flash('alert', array('type' => "success", 'messages' => array('Product '.$product->name.' added!')));
		return Redirect::to('admin/products');
	}

	public function getEdit($id)
	{
		$data['title'] = 'Products - Edit';
		$data['panel_title'] = 'Products - Edit';
		$data['categories'] = Categories::all();
		$data['product'] = Products::find($id);

		return View::make('backend.products.edit', $data);
	}

	public function postEdit($id)
	{
		$product = Products::find($id);
		$product->name = Input::get('name');
		$product->description = Input::get('description');
		$product->price = Input::get('price');
		$product->code = Input::get('code');
		$product->stock = Input::get('stock');
		$product->active = Input::get('active');
		$product->category_id = Input::get('category');
		$product->save();

		Session::flash('alert', array('type' => "success", 'messages' => array('Product '.$product->name.' updated!')));
		return Redirect::to('admin/products');
	}

	public function getDelete($id)
	{
		$product = Products::find($id);
		$product->delete();

		Session::flash('alert', array('type' => "success", 'messages' => array('Product '.$product->name.' deleted!')));
		return Redirect::to('admin/products');
	}

	public function getMoveup($id)
	{
		Products::moveUp($id);
		return Redirect::to('admin/products');
	}

	public function getMovedown($id)
	{
		Products::moveDown($id);
		return Redirect::to('admin/products');
	}

	public function getToggleactive($id)
	{
		$product = Products::find($id);
		$product->active = !$product->active;
		$product->save();

		return Redirect::to('admin/products');
	}

}