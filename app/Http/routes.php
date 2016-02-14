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

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['adminauth']), function () {




    Route::get('/', 'AdminPagesController@home');
    Route::get('/list/{section?}/{sub?}', 'AdminPagesController@lista');
    Route::get('/create/{section}', 'AdminPagesController@create');
    Route::post('/create/{section}', 'AdminPagesController@store');
    Route::get('/edit/{section}/{id?}/{type?}', 'AdminPagesController@edit');
    Route::get('/edit/{section}/{id?}/{type?}', 'AdminPagesController@edit');
    Route::post('/edit/{section}/{id?}', 'AdminPagesController@update');

    Route::get('/editmodal/{section}/{id?}/{type?}', 'AdminPagesController@editmodal');
    Route::post('/editmodal/{section}/{id?}', 'AdminPagesController@updatemodal');

    Route::get('/delete/{section}/{id?}', 'AdminPagesController@destroy');


    Route::get('password/email', 'AdminPasswordController@getEmail');
    Route::post('password/email', 'AdminPasswordController@postEmail');


    Route::get('api/update/{method}/{model?}/{id?}', 'AjaxController@update');
    Route::get('api/delete/{model?}/{id?}', 'AjaxController@delete');
    Route::post('api/uploadifive/', 'AjaxController@uploadifive');
    Route::get('api/updateHtml/{mediaType?}/{model?}/{id?}', 'AjaxController@updeteMediaList');
    Route::get('api/updateMediaSortList/', 'AjaxController@updateMediaSortList');


});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {


    Route::get('/', 'PagesController@home');
    Route::get('/news/', 'PagesController@news');
    Route::get('/news/{slug}', 'PagesController@news');
    Route::get('/{slug?}', 'PagesController@pages');
    Route::post('/contact', 'PagesController@getContactUsForm');

    Route::get('/api/new/{post?}', function (App\Article $post) {
        return $post;
    });


    Route::get('/admin/login', 'Admin\AuthController@getLogin');
    Route::post('admin/login', 'Admin\AuthController@adminLogin');
    Route::get('admin/logout', 'Admin\AuthController@getLogout');
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

