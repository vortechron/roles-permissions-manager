<?php

namespace Vortechron\RPManager;

use Illuminate\Support\ServiceProvider;

class RPProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require __DIR__ . '/helpers.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ .'/../resources/views', 'rpmanager');
    }
}
