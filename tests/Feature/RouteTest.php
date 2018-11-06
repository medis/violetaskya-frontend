<?php

namespace VioletaskyaFrontend\Tests\Feature;

use VioletaskyaFrontend\Tests\FeatureTestCase;

class RouteTest extends FeatureTestCase
{
    /** @test */
    public function it_can_load_page()
    {
        $this->get('/')
            ->assertSuccessful();
    }
}