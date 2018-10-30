<?php

namespace VioletaskyaFrontend\Console;

use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'violetaskya-frontend:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update violetaskya.com resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Updating violetaskya.com assets...');
        $this->callSilent('vendor:publish', [
            '--tag' => 'violetaskya-assets',
            '--force' => true
        ]);

        $this->info('violetaskya.com assets updated successfully.');
    }
}