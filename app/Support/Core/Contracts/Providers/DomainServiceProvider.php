<?php

namespace App\Support\Core\Contracts\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register domain routes
     * 
     * @var array<int, string>
     */
    protected array $routes = [];

    /**
     * Register domain migrations
     * 
     * @var array<int, string>
     */
    protected array $migrations = [];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadDomainRoutes();

        if ($this->app->runningInConsole()) {
            $this->loadDomainMigrations();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Loading Routes from Domain
     */
    public function loadDomainRoutes(): void
    {
        foreach ($this->routes as $route) {
            $this->loadRoutesFrom(
                path: app_path($route)
            );
        }
    }

    /**
     * Loading Migrations from Domain
     */
    public function loadDomainMigrations(): void
    {
        foreach ($this->migrations as $migration) {
            $this->loadMigrationsFrom(
                paths: $migration
            );
        }
    }
}