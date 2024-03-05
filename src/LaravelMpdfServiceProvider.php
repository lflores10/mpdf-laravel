<?php

namespace lflores10\LaravelMpdf;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class LaravelMpdfServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider
     * 
     * @return void
     */

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravelPdf.php' => config_path("laravelPdf.php"),
        ], "mpdf-config");
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {    
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravelPdf.php', 'pdf'
        );

        $this->app->bind('laravel-mpdf', function ($app) {
            return new LaravelMpdfWrapper();
        });
    }

}
