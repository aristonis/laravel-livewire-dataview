<?php

namespace Aristonis\LaravelLivewireDataview\Tests;

use Aristonis\LaravelLivewireDataview\LaravelLirewireDataviewServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
  protected function getPackageProviders($app)
  {
    return [
      LivewireServiceProvider::class, // REQUIRED
      LaravelLirewireDataviewServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    $app['config']->set('database.default', 'testing');

    $app['config']->set('database.connections.testing', [
      'driver' => 'sqlite',
      'database' => ':memory:',
      'prefix' => '',
    ]);
  }
}
