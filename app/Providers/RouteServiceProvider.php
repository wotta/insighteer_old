<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Insighteer\Routes\LaravelRouteModelBinder;

class RouteServiceProvider extends ServiceProvider
{
    /** @var string */
    protected $namespace = 'App\Http\Controllers';

    /** @var LaravelRouteModelBinder */
    private $routeModelBinder;

    public function boot(): void
    {
        parent::boot();

        $this->routeModelBinder = $this->app->make(LaravelRouteModelBinder::class);
        $this->routeModelBinder->setupRouteBindings();
    }

    public function register()
    {
        $this->app->when(LaravelRouteModelBinder::class)
            ->needs('$routeBindings')
            ->give(function () {
                return config('insighteer.route_bindings');
            });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapAuthRoutes();

        $this->mapWebRoutes();
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
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
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
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    private function mapAuthRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));
    }
}
