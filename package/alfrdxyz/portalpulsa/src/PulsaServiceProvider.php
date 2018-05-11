<?php

namespace alfrdxyz\portalpulsa;

use Illuminate\Support\ServiceProvider;

class PulsaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([__DIR__.'/PortalPulsaConfig.php' => config_path('PortalPulsaConfig.php')]  , 'config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $configFile = config_path('PortalPulsaConfig.php');

        if(file_exists($configFile))
        {
            $this->mergeConfigFrom($configFile , 'config');
        }else{
            $this->mergeConfigFrom(__DIR__.'/PortalPulsaConfig.php', 'config');
        }
        

        //

        $this->app->bind('run-portalpulsa' , function(){

            return new PortalPulsa;
        });
    }
}
