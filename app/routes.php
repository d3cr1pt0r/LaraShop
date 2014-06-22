<?php
/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::group(array('namespace' => 'Admin'), function()
{
	Route::controller('admin/languages', 'LanguagesController');
	Route::controller('admin/carousel', 'CarouselController');
	Route::controller('admin/products', 'ProductsController');
	Route::controller('admin/categories', 'CategoriesController');
	Route::controller('admin', 'HomeController');
});

/*
|--------------------------------------------------------------------------
| Shop routes
|--------------------------------------------------------------------------
*/

Route::group(array('namespace' => 'Shop'), function()
{
	Route::controller('/categories', 'CategoriesController');
	Route::controller('/', 'HomeController');
});