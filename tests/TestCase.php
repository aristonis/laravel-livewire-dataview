<?php

namespace Aristonis\LaravelLivewireDataview\Tests;

use Aristonis\LaravelLivewireDataview\LaravelLirewireDataviewServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }
  protected function getPackageProviders($app)
  {
    return [
      LaravelLirewireDataviewServiceProvider::class,
    ];
  }
  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }
}
