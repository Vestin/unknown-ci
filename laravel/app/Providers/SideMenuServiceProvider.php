<?php

namespace App\Providers;

use App\Components\SideMenu;
use Illuminate\Support\ServiceProvider;

class SideMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (file_exists($file = $this->app['path.base'] . '/routes/sideMenus.php')) {
            require $file;
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SideMenu::class, function ($app) {
            return new SideMenu();
        });
    }
}
