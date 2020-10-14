<?php
namespace BSProxy;

use Illuminate\Support\ServiceProvider;

class BSProxyServiceProvider extends ServiceProvider
{
    public function boot(): void {
        $this->publishes( __DIR__ . '/config/proxy-services-url.php','config');
    }
}