<?php

namespace BeetechAsia\GoShip\Tests;

use BeetechAsia\GoShip\GoShipServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        config()->set([
            'app.faker_locale' => 'vi_VN',
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'BeetechAsia\\GoShip\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            GoShipServiceProvider::class,
        ];
    }
}
