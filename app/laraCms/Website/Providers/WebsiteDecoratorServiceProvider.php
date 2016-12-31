<?php

namespace App\LaraCms\Website\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class WebsiteDecoratorServiceProvider extends ServiceProvider
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
		App::bind('ImgHelper', function() {return new \App\LaraCms\Tools\ImgHelper;});
    }
}
