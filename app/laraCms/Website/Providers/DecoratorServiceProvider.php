<?php

namespace App\laraCms\Website\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class DecoratorServiceProvider extends ServiceProvider
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
        App::bind('HtmlMenu', function()
        {
            return new App\laraCms\Website\Decorator\HtmlMenu;
        });
        App::bind('HtmlSocial', function()
        {
            return new App\laraCms\Website\Decorator\HtmlSocial;
        });
    }
}
