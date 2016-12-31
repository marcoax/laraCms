<?php

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['adminauth']), function () {

    Route::get('/', '\App\LaraCms\Admin\Controllers\AdminPagesController@home');
    Route::get('/list/{section?}/{sub?}', '\App\LaraCms\Admin\Controllers\AdminPagesController@lista');
    Route::get('/create/{section}',     '\App\LaraCms\Admin\Controllers\AdminPagesController@create');
    Route::post('/create/{section}',    '\App\LaraCms\Admin\Controllers\AdminPagesController@store');


    Route::get('/edit/{section}/{id?}/{type?}', '\App\LaraCms\Admin\Controllers\AdminPagesController@edit');
    Route::post('/edit/{section}/{id?}',        '\App\LaraCms\Admin\Controllers\AdminPagesController@update');

    Route::get('/editmodal/{section}/{id?}/{type?}', '\App\LaraCms\Admin\Controllers\AdminPagesController@editmodal');
    Route::post('/editmodal/{section}/{id?}', '\App\LaraCms\Admin\Controllers\AdminPagesController@updatemodal');
    Route::get('/delete/{section}/{id?}', '\App\LaraCms\Admin\Controllers\AdminPagesController@destroy');

    Route::get('api/update/{method}/{model?}/{id?}', '\App\LaraCms\Admin\Controllers\AjaxController@update');
    Route::get('api/delete/{model?}/{id?}', '\App\LaraCms\Admin\Controllers\AjaxController@delete');
    Route::post('api/uploadifive/', '\App\LaraCms\Admin\Controllers\AjaxController@uploadifive');
    Route::get('api/updateHtml/{mediaType?}/{model?}/{id?}', '\App\LaraCms\Admin\Controllers\AjaxController@updateMediaList');
    Route::get('api/updateMediaSortList/', '\App\LaraCms\Admin\Controllers\AjaxController@updateMediaSortList');
    Route::get('api/suggest', ['as' => 'api.suggest', 'uses' => '\App\LaraCms\Admin\Controllers\AjaxController@suggest']);

    Route::get('export/{model?}', '\App\LaraCms\Admin\Controllers\ExportController@model');

});

/*
    |--------------------------------------------------------------------------
    | ADMIN AUTH
    |--------------------------------------------------------------------------
    */
    Route::group(array('prefix' => 'admin'), function () {

        // Admin Auth and Password routes...
        Route::get('login',  '\App\LaraCms\Admin\Controllers\Auth\LoginController@showLoginForm');
        Route::post('login', '\App\LaraCms\Admin\Controllers\Auth\LoginController@login');
        Route::get('logout', '\App\LaraCms\Admin\Controllers\Auth\LoginController@logout');


        // Password Reset Routes...
        Route::get('password/reset',         '\App\LaraCms\Admin\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('password/email',        '\App\LaraCms\Admin\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}', '\App\LaraCms\Admin\Controllers\Auth\ResetPasswordController@showResetForm');
        Route::post('password/reset',        '\App\LaraCms\Admin\Controllers\Auth\ResetPasswordController@reset');
    });

/*
|--------------------------------------------------------------------------
| FRONT END
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {



    // Authentication routes...
    Route::get('users/login', '\App\LaraCms\Website\Controllers\Auth\LoginController@showLoginForm')->name('users/login');
    Route::post('users/login','\App\LaraCms\Website\Controllers\Auth\LoginController@login');
    Route::get('users/logout','\App\LaraCms\Website\Controllers\Auth\LoginController@logout');


    // Registration routes...
    Route::get('/register', '\App\LaraCms\Website\Controllers\Auth\RegisterController@showRegistrationForm');
    Route::post('/register','\App\LaraCms\Website\Controllers\Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset',        '\App\LaraCms\Website\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email',       '\App\LaraCms\Website\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}','\App\LaraCms\Website\Controllers\Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset',       '\App\LaraCms\Website\Controllers\Auth\ResetPasswordController@reset');


    // Pages routes...
    Route::get('/',                     '\App\LaraCms\Website\Controllers\PagesController@home');
    Route::get('/news/',                '\App\LaraCms\Website\Controllers\PagesController@news');
    Route::get('/news/{slug}',          '\App\LaraCms\Website\Controllers\PagesController@news');
    Route::get('/products/{product?}',	'\App\LaraCms\Website\Controllers\ProductsController@products');
    Route::get('/{slug?}',              '\App\LaraCms\Website\Controllers\PagesController@pages');
    Route::post('/contacts/',		    '\App\LaraCms\Website\Controllers\WebsiteFormController@getContactUsForm');

    Route::post('/api/newsletter',      '\App\LaraCms\Website\Controllers\ApiController@subscribeNewsletter');

});

/*
|--------------------------------------------------------------------------
|   RESERVED AREA USER ROUTE
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['auth']], function () {
    Route::get('users/dashboard',    '\App\LaraCms\Website\Controllers\ReservedAreaController@dashboard');
    Route::get('users/profile','\App\LaraCms\Website\Controllers\ReservedAreaController@profile');
});
