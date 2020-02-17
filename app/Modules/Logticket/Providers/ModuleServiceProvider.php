<?php

namespace App\Modules\Logticket\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('logticket', 'Resources/Lang', 'app'), 'logticket');
        $this->loadViewsFrom(module_path('logticket', 'Resources/Views', 'app'), 'logticket');
        $this->loadMigrationsFrom(module_path('logticket', 'Database/Migrations', 'app'), 'logticket');
        $this->loadConfigsFrom(module_path('logticket', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('logticket', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
