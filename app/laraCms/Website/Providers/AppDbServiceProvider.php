<?php

namespace App\laraCms\Website\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class AppDbServiceProvider extends ServiceProvider
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
        App::bind('App\laraCms\Website\Repos\Article\ArticleRepositoryInterface', 'App\laraCms\Website\Repos\Article\DbArticleRepository');
        App::bind('App\laraCms\Website\Repos\News\NewsRepositoryInterface', 'App\laraCms\Website\Repos\News\DbNewsRepository');
        App::bind('App\laraCms\Website\Repos\Product\ProductRepositoryInterface', 'App\laraCms\Website\Repos\Product\DbProductRepository');
    }
}
