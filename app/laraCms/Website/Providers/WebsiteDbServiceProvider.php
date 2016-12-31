<?php

namespace App\LaraCms\Website\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class WebsiteDbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface', 'App\LaraCms\Website\Repos\Article\DbArticleRepository');
        App::bind('App\LaraCms\Website\Repos\News\NewsRepositoryInterface', 'App\LaraCms\Website\Repos\News\DbNewsRepository');
        App::bind('App\LaraCms\Website\Repos\Product\ProductRepositoryInterface', 'App\LaraCms\Website\Repos\Product\DbProductRepository');

    }
}
