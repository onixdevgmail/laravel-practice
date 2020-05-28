<?php

namespace Core\Api;
use Core\Api\Commands\PendingProductsCommand;
use Illuminate\Support\ServiceProvider;

class CoreApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'core-api');
        $this->commands([
            PendingProductsCommand::class,
        ]);
    }
}
