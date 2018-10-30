<?php

namespace VioletaskyaFrontend\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'violetaskya-frontend:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Violetaskya.com resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing violetaskya.com assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'violetaskya-assets']);

        $this->info('violetaskya.com frontend installed successfully.');
    }
}