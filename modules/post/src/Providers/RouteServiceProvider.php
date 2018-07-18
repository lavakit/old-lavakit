<?php namespace Inspire\Post\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Inspire\Post\Http\Controllers';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web'],
            'namespace' => $this->namespace,
            'prefix' => LaravelLocalization::setLocale(),
        ], function ($router) {

            require __DIR__ . '/../../routes/web.php';
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
             'middleware' => 'api',
             'namespace' => $this->namespace,
             'prefix' => 'api'
         ], function ($router) {
            require __DIR__ . '/../../routes/api.php';
        });
    }
}
