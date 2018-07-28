<?php

namespace Insighteer\Routes;

use Illuminate\Support\Facades\Route;

class LaravelRouteModelBinder
{
    /** @var array */
    private $routeBindings;

    public function __construct(array $routeBindings)
    {
        $this->routeBindings = $routeBindings;
    }

    public function setupRouteBindings(): void
    {
        foreach ($this->routeBindings as $routeBinding) {
            Route::bind($routeBinding['route_key'], function (int $accountId) use ($routeBinding) {
                return (new $routeBinding['transformer']())
                    ->transform($routeBinding['model']::find($accountId));
            });
        }
    }
}