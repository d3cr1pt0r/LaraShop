<?php
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::group(array('namespace' => 'Admin'), function()
{
	Route::controller('admin/products', 'ProductsController');
	Route::controller('admin/categories', 'CategoriesController');
	Route::controller('admin', 'HomeController');

	// Temporary redirect to admin
	Route::get('/', function()
	{
		return Redirect::to('admin');
	});
});
/*
|--------------------------------------------------------------------------
| Shop routes
|--------------------------------------------------------------------------
*/

