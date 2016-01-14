<?php
namespace App\laraCms\Notifications;
Use App;
use Illuminate\Support\ServiceProvider;
class FlashServiceProvider     extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Laracasts\Flash\SessionStore',
            'Laracasts\Flash\LaravelSessionStore'
        );
        $this->app->singleton('flash', function () {
            return $this->app->make('App\laraCms\Notifications\FlashNotifier');
        });
    }
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../../resources/views/shared/', 'flash');
        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/shared/')
        ]);
    }
}