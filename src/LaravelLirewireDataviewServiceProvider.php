<?php

namespace Aristonis\LaravelLivewireDataview;

use Aristonis\LaravelLivewireDataview\Commands\MakeDataViewCommand;
use Illuminate\Support\ServiceProvider;

class LaravelLirewireDataviewServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/dataview.php", "dataview");
    }

    public function boot()
    {
        // Register command (only in console)
        if ($this->app->runningInConsole()) {

            $this->commands([
                MakeDataViewCommand::class,
            ]);

            // Publish stubs (optional)
            $this->publishes([
                __DIR__ . '/../stubs' => base_path('stubs/laravel-livewire-dataview'),
            ], 'dataview-stubs');
        }
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
