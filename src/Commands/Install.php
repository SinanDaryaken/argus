<?php

namespace Daryakenari\Argus\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    protected $signature = 'argus:install';

    protected $description = 'Greek God Argus';

    public function handle()
    {
        if(!$this->confirm('Its now or never'))
        return;

        Artisan::call('migrate', ['--force' => true]);
        $this->info(Artisan::output());

        $this->info(" Completed" . PHP_EOL);
    }
}