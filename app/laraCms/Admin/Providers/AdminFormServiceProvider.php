<?php

namespace App\laraCms\Admin\Providers;
Use App;
use Illuminate\Support\ServiceProvider;

class AdminFormServiceProvider extends ServiceProvider
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
        App::bind('AdminForm', function()
        {
            return new \App\laraCms\Admin\AdminForm;
        });
    }
}