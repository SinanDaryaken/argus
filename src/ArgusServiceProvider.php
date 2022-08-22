<?php

namespace Daryakenari\Argus;

use Illuminate\Support\ServiceProvider;
use Weebimo\Core\Commands\Install;

class ArgusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/argus.php', 'argus');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        $this->commands([Install::class]);
    }
}