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

    Route::get('/', '\App\laraCms\Admin\Controllers\AdminPagesController@home');
    Route::get('/list/{section?}/{sub?}', '\App\laraCms\Admin\Controllers\AdminPagesController@lista');
    Route::get('/create/{section}', '\App\laraCms\Admin\Controllers\AdminPagesController@create');
    Route::post('/create/{section}', '\App\laraCms\Admin\Controllers\AdminPagesController@store');
    Route::get('/edit/{section}/{id?}/{type?}', '\App\laraCms\Admin\Controllers\AdminPagesController@edit');
    Route::get('/edit/{section}/{id?}/{type?}', '\App\laraCms\Admin\Controllers\AdminPagesController@edit');
    Route::post('/edit/{section}/{id?}', '\App\laraCms\Admin\Controllers\AdminPagesController@update');

    Route::get('/editmodal/{section}/{id?}/{type?}', '\App\laraCms\Admin\Controllers\AdminPagesController@editmodal');
    Route::post('/editmodal/{section}/{id?}', '\App\laraCms\Admin\Controllers\AdminPagesController@updatemodal');

    Route::get('/delete/{section}/{id?}', '\App\laraCms\Admin\Controllers\AdminPagesController@destroy');

    Route::get('api/update/{method}/{model?}/{id?}', '\App\laraCms\Admin\Controllers\AjaxController@update');
    Route::get('api/delete/{model?}/{id?}', '\App\laraCms\Admin\Controllers\AjaxController@delete');
    Route::post('api/uploadifive/', '\App\laraCms\Admin\Controllers\AjaxController@uploadifive');
    Route::get('api/updateHtml/{mediaType?}/{model?}/{id?}', '\App\laraCms\Admin\Controllers\AjaxController@updeteMediaList');
    Route::get('api/updateMediaSortList/', '\App\laraCms\Admin\Controllers\AjaxController@updateMediaSortList');

    Route::get('export/{model?}', '\App\laraCms\Admin\Controllers\ExportController@model');

});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {


    App::bind('App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface', 'App\LaraCms\Website\Repos\Article\DbArticleRepository');
    App::bind('App\LaraCms\Website\Repos\Post\NewsRepositoryInterface', 'App\LaraCms\Website\Repos\Post\DbNewsRepository');


    Route::get('/',            '\App\laraCms\Website\Controllers\PagesController@home');
    Route::get('/news/',       '\App\laraCms\Website\Controllers\PagesController@news');
    Route::get('/news/{slug}', '\App\laraCms\Website\Controllers\PagesController@news');
    Route::get('/{slug?}',     '\App\laraCms\Website\Controllers\PagesController@pages');
    Route::post('/contact',    '\App\laraCms\Website\Controllers\FormsController@getContactUsForm');

    Route::post('/api/newsletter',        '\App\laraCms\Website\Controllers\ApiController@subscribeNewsletter');

    Route::get('/api/new/{post?}', function (App\Article $post) {
        return $post;
    });


    Route::get('/admin/login', '\App\laraCms\Admin\Controllers\AuthController@getLogin');
    Route::post('admin/login', '\App\laraCms\Admin\Controllers\AuthController@adminLogin');
    Route::get('admin/logout', '\App\laraCms\Admin\Controllers\AuthController@getLogout');
    Route::get('admin/password/email', '\App\laraCms\Admin\Controllers\AdminPasswordController@getEmail');
    Route::post('admin/password/email', '\App\laraCms\Admin\Controllers\AdminPasswordController@postEmail');

    // Authentication routes...
    Route::get('users/login',  '\App\laraCms\Website\Controllers\AuthController@getLogin');
    Route::post('users/login', '\App\laraCms\Website\Controllers\AuthController@postLogin');
    Route::get('users/logout', '\App\laraCms\Website\Controllers\AuthController@getLogout');

    Route::get('users/dashboard',  '\App\laraCms\Website\Controllers\UserController@dashboard')->middleware('auth');
    Route::get('users/profile', '\App\laraCms\Website\Controllers\UserController@profile')->middleware('auth');
/*
    Route::get('profile', [
        'middleware' => 'auth',
        'uses' => 'ProfileController@show'
    ]);
*/

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

