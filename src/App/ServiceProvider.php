<?php
/**
 * Description of ServiceProvider.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Liuba Kalyta <kalyta@dotsplatform.com>
 */

namespace App;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/cashback.php', 'cashback'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/cashback.php' => config_path('cashback.php'),
        ]);
    }
}