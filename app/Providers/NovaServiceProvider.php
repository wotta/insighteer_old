<?php

namespace App\Providers;

use Beyondcode\TinkerTool\Tinker;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Wotta\SyncCard\SyncCard;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'wotty@test.com',
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help(),
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new Tinker(),
        ];
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
