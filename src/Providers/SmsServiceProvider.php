<?php

namespace Panobit\SmsGateway\Providers;

use Illuminate\Support\ServiceProvider;
use Panobit\SmsGateway\SmsManager;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Configurations that needs to be done by user.
         */
        $this->publishes([
            __DIR__.'/../Config/sms.php' => config_path('sms.php'),
        ], 'config');


        /**  Not sure if this works
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/sms.php',
            'sms'
        );
         **/

        /**
         * Bind to service container.
         */
        $this->app->bind('panobit-sms', function () {
            return new SmsManager(config('sms'));
        });

        $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventProvider::class);
    }

}
