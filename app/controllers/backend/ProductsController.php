<?php namespace Admin;
use Controller, View, Auth, Input, File, Session, Redirect, URL;

class ProductsController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('auth.admin');
	}

	public function getIndex()
	{
		$data['title'] = 'Products';
		$data['panel_title'] = 'Products';
		$data['products'] = Products::orderBy('position', 'asc')->get();

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
		$product->position = Products::nextPosition();
		$product->save();
		
		if(Input::hasFile('files'))
		{
			$files = Input::file('files');
			$foldername = 'uploads/product_images/'.str_random(32).'/';
			foreach($files as $file)
			{
				$filename = str_random(32).'.'.$file->getClientOriginalExtension();
				$file->move($foldername, $filename);

				$product_images = new ProductImages();
				$product_images->product_id = $product->id;
				$product_images->folder = $foldername;
				$product_images->src = $foldername.$filename;
				$product_images->active = '1';
				$product_images->position = ProductImages::nextPosition();
				$product_images->save();
			}
		}

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

		if(Input::hasFile('files'))
		{
			$files = Input::file('files');
			$foldername = 'uploads/product_images/'.str_random(32).'/';
			foreach($files as $file)
			{
				$filename = str_random(32).'.'.$file->getClientOriginalExtension();
				$file->move($foldername, $filename);

				$product_images = new ProductImages();
				$product_images->product_id = $product->id;
				$product_images->folder = $foldername;
				$product_images->src = $foldername.$filename;
				$product_images->active = '1';
				$product_images->position = ProductImages::nextPosition();
				$product_images->save();
			}
		}

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

	public function getDeleteimage($id)
	{
		$image = ProductImages::find($id);
		$image->delete();
		File::delete($image->src);

		Session::flash('alert', array('type' => "success", 'messages' => array('Image deleted!')));
		return Redirect::to(URL::previous());
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
		Products::toggleActive($id);
		return Redirect::to('admin/products');
	}

	public function getToggleactiveimage($id)
	{
		ProductImages::toggleActive($id);
		return Redirect::to(URL::previous());
	}

}