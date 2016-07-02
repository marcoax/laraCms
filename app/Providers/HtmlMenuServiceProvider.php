<?php

namespace App\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class HtmlMenuServiceProvider extends ServiceProvider
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
            return new \App\laraCms\Website\HtmlMenu;
        });
    }
}
