<?php

namespace Mcc\Laravelcms;

use Artisan;
use Illuminate\Support\ServiceProvider;

class MccCmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include_once __DIR__.'/routes.php';
        include_once __DIR__.'/helpers/MccHelperFunctions.php';
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        if ($this->app->runningInConsole()) {
          $this->registerSeedsFrom(__DIR__.'/database/seeds');
        }
        // publish packages js via php artisan vendor:publish --tag=public --force
        $this->publishes([
          __DIR__."/public" => public_path('js')
        ],'public');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/views','laravelcms');
    }

    protected function registerSeedsFrom($path)
    {
        // todo not properly implemented
        include_once $path.'/PageDatabaseSeeder.php';
        $command = request()->server('argv', null);
        $command = implode(' ', $command);

        if ($command == "artisan db:seed") {
          Artisan::call('db:seed', ['--class' => 'PageDatabaseSeeder']);
        }
    }
}
