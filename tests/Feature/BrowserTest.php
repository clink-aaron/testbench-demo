<?php

namespace Tests\Feature;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Facades\Route;

class BrowserTest extends \Orchestra\Testbench\Dusk\TestCase
{
    protected static $baseServeHost = 'testbench';
    protected static $baseServePort = 8000;
    protected $loadEnvironmentVariables = true;

//    public static function prepare()
//    {
//    }

    protected function driver(): RemoteWebDriver
    {
        return RemoteWebDriver::create(
            'http://selenium:4444/wd/hub', DesiredCapabilities::chrome()
        );
    }

    protected function defineRoutes($router)
    {
        $router->get('/hi', fn() => 'hello');
        $router->getRoutes()->refreshNameLookups();
    }

    public function testRoute()
    {
        $response = $this->get('/hi');
        $response->assertSee('hello');

        $response->assertStatus(200);
    }

    public function testBrowser()
    {
        $this->browse(function ($browser) {
            $browser->visit('/hi')
                ->screenshot('hello')
                ->assertSee('hello')
                ->assertPathIs('/hi');
        });
    }
}
