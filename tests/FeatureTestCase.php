<?php

namespace VioletaskyaFrontend\Tests;

use Orchestra\Testbench\TestCase;
use VioletaskyaFrontend\AppServiceProvider;

class FeatureTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AppServiceProvider::class
        ];
    }

    /**
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $config = $app->get('config');
        $config->set('logging.default', 'errorlog');

        $app->bind('path.public', function() {
            return realpath(__DIR__ . '/../../violetatest/public');
        });
    }
}