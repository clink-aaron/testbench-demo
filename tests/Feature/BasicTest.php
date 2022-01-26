<?php

namespace Tests\Feature;

use Orchestra\Testbench\TestCase;

class BasicTest extends TestCase
{
    protected $loadEnvironmentVariables = true;

    protected function defineRoutes($router)
    {
        // Define routes.
        $router->get('/hi', fn() => 'hello');
    }

    /**
     * demonstrate registered routes work with basic testbench:
     *
     * @return void
     */
    public function testRoute()
    {
        $response = $this->get('/hi');
        $response->assertSee('hello');
        $content = $response->getContent();

        $response->assertStatus(200);
    }
}
