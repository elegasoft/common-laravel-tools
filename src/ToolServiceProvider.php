<?php

namespace Elegasoft\CommonLaravelTools;

use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/common-laravel-tools.php' => config_path('common-laravel-tools.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/elegasoft/common-laravel-tools')
        ], 'views');
        $this->loadViewsFrom(resource_path('views/vendor/elegasoft/common-laravel-tools'), 'common-laravel-tools');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // create image
        $this->app->singleton('common-exception-handler', function ($app) {
            $e = new \Exception();
            return new CommonExceptionHandler($e);
        });
    }
}
