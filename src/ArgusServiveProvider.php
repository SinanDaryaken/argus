<?php

namespace Chess\Argus;

use Illuminate\Support\ServiceProvider;

class ArgusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/argus.php', 'argus');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }
}