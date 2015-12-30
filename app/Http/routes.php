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

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'), function () {

	Route::get('/', 'AdminPagesController@home');
	Route::get('/list/{section?}/{sub?}', 'AdminPagesController@lista');
	Route::get('/create/{section}', 'AdminPagesController@create');
	Route::post('/create/{section}', 'AdminPagesController@store');
	Route::get('/edit/{section}/{id?}', 'AdminPagesController@edit');
	Route::post('/edit/{section}/{id?}', 'AdminPagesController@update');
	Route::get('/delete/{section}/{id?}','AdminPagesController@destroy');


	/*

    Route::get('articles/{id?}/delete','ArticlesController@destroy');
    Route::get('users/{id?}/delete','UsersController@destroy');
    Route::get('roles/{id?}/delete','RolesController@destroy');
    Route::get('socials/{id?}/delete','SocialsController@destroy');
    Route::get('hpsliders/{id?}/delete','HpSlidersController@destroy');
    */


	Route::get('api/update/{method}/{model?}/{id?}','AjaxController@update');
	Route::get('api/delete/{model?}/{id?}','AjaxController@delete');

});

 Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/


		Route::get('/', 'PagesController@home');
		Route::get('/news/', 'PagesController@news');
		Route::get('/news/{slug}', 'PagesController@news');
		Route::get('/{slug?}', 'PagesController@pages');

		Route::get('/api/new/{post?}', function(App\Article $post) {
			return $post;
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

