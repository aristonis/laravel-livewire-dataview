<?php

namespace Aristonis\LaravelLivewireDataview;

use Aristonis\LaravelLivewireDataview\Commands\MakeDataViewCommand;
use Illuminate\Support\ServiceProvider;

class LaravelLivewireDataviewServiceProvider extends ServiceProvider
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

           
        }
        
        $this->publishList();
        

        $this->loadViewsFrom(__DIR__ . "/../resources/views", 'aristonis-dataview');
        
    }


    public function publishList(){
        $this->publishConfig();
        $this->publishStubs();
        $this->publishViews();

    }
    /* start publish methods */
    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/dataview.php' => config_path('dataview.php'),
        ], 'dataview-config');
    }

    private function publishStubs(){
         $this->publishes([
                __DIR__ . '/../stubs' => base_path('stubs/laravel-livewire-dataview'),
            ], 'dataview-stubs');
    }
    public function publishViews(){
        $this->publishes([
            __DIR__ .'/../resources/views/' => resource_path('views/vendor/aristonis-dataview'),
        ],
        "dataview-views");
    }
    /* end publish methods */

}
