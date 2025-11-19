<?php

namespace Aristonis\LaravelLivewireDataview;

use Illuminate\Support\ServiceProvider;

class LaravelLirewireDataviewServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/dataview.php", "dataview");
    }

    public function boot()
    {
        // start publishes
        $this->publishConfig();
        // end publishes

        $this->loadViewsFrom(__DIR__ . "/../resources/views", 'aristonis-dataview');

    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/dataview.php' => config_path('dataview.php'),
        ], 'dataview-config');
    }
}
