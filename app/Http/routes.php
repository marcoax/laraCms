<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



 Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        
		Route::get('/', function () {
		    return view('welcome');
		});
		
		Route::resource('products', 'ProductsController');
		Route::bind('tasks', function($value, $route) {
			return App\Product::whereSlug($value)->first();
		});
		
		Route::bind('products', function($value, $route) {
			return App\Product::whereSlug($value)->first();
		});
		
		Route::get('csv', function()
		{
		    if (($handle = fopen(public_path() . '/import/nazioni.csv','r')) !== FALSE)
		    {
		        while (($data = fgetcsv($handle, 1000, ',')) !==FALSE)
		        {
		                //$scifi = new Scifi();
		                //$scifi->character = $data[0];
		                //$scifi->movie = $data[1];
		                //$scifi->save();
		                //print_r( $data[0] );
		        }
		        fclose($handle);
		    }
		
		    return Scifi::all();
		});
        
        
			// Authentication routes...
			Route::get('users/login', 'Auth\AuthController@getLogin');
			Route::post('users/login', 'Auth\AuthController@postLogin');
			Route::get('users/logout', 'Auth\AuthController@getLogout');
			
			// Registration routes...
			Route::get('users/register', 'Auth\AuthController@getRegister');
			Route::post('users/register', 'Auth\AuthController@postRegister');
			
			
			Route::controllers([
			   'password' => 'Auth\PasswordController',
			]);
			Route::get('password/email', 'Auth\PasswordController@getEmail');
			Route::post('password/email', 'Auth\PasswordController@postEmail');
			
			// Password reset routes...
			Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
			Route::post('password/reset', 'Auth\PasswordController@postReset');
});

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'), function () {
	 	
	 Route::get('/', 'PagesController@home');
	 Route::get('/list/{section?}/{sub?}', 'PagesController@lista');
	 Route::get('/create/{section}', 'PagesController@create');
	 Route::post('/create/{section}', 'PagesController@store');
	 Route::get('/edit/{section}/{id?}', 'PagesController@edit');
	 Route::post('/edit/{section}/{id?}', 'PagesController@update');
	 
	 Route::get('articles', 'ArticlesController@index');
	 Route::get('articles/create', 'ArticlesController@create');
	 Route::post('articles/create', 'ArticlesController@store');
	 Route::get('articles/{id?}/edit', 'ArticlesController@edit');
	 Route::post('articles/{id?}/edit','ArticlesController@update');
	 Route::get('articles/{id?}/delete','ArticlesController@destroy');
	 
	 Route::get('users', 'UsersController@index');
	 Route::get('users/create', 	 'UsersController@create');
	 Route::post('users/create', 	 'UsersController@store');
	 Route::get('users/{id?}/edit', 'UsersController@edit');
	 Route::post('users/{id?}/edit','UsersController@update');
	 Route::get('users/{id?}/delete','UsersController@destroy');
	 
	
	 Route::get('roles/create', 	 'RolesController@create');
     Route::post('roles/create', 	 'RolesController@store');
	 Route::get('roles/{id?}/edit',  'RolesController@edit');
	 Route::post('roles/{id?}/edit', 'RolesController@update');
	 Route::get('roles/{id?}/delete','RolesController@destroy');
	 
	 Route::get('api/update/{method}/{model?}/{id?}','AjaxController@update');
	 Route::get('api/delete/{model?}/{id?}','AjaxController@delete');
	 
	 
});