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
}