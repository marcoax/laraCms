<?php namespace App\LaraCms\Providers;

use Illuminate\Support\ServiceProvider;

/*
 *  laraCms
 */
use DB;
use Event;
/*
    |--------------------------------------------------------------------------
    | common laraCms service providers
    |--------------------------------------------------------------------------
    | here  will'be set all the common action
    */
class LaraServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
          * GF_ma for laraCms
          * simple query debugger
          * use http://framework_base.dev/admin/list/articles?sql-debug=1
          */
        view()->composer('*', function($view){
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });

        /*
         * GF_ma for laraCms
         * simple query debugger
         * use http://framework_base.dev/admin/list/articles?sql-debug=1
         */
        if (env('APP_ENV') === 'local') {
            DB::connection()->enableQueryLog();
        }
        if (env('APP_ENV') === 'local') {
            Event::listen('kernel.handled', function ($request, $response) {
                if ( $request->has('sql-debug') ) {
                    $queries = DB::getQueryLog();
                    dd($queries);
                }
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
