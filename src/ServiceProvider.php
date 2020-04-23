<?php
/**
 * Description of ServiceProvider.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            '/config/cashback.php', 'cashback'
        );
    }

    public function boot()
    {
        $this->publishes([
            '/config/cashback.php' => config_path('cashback.php'),
        ]);
    }
}