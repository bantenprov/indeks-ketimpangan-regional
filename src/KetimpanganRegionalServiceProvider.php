<?php

namespace Bantenprov\KetimpanganRegional;

use Illuminate\Support\ServiceProvider;
use Bantenprov\KetimpanganRegional\Console\Commands\KetimpanganRegionalCommand;

/**
 * The KetimpanganRegionalServiceProvider class
 *
 * @package Bantenprov\KetimpanganRegional
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KetimpanganRegionalServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ketimpangan-regional', function ($app) {
            return new KetimpanganRegional;
        });

        $this->app->singleton('command.ketimpangan-regional', function ($app) {
            return new KetimpanganRegionalCommand;
        });

        $this->commands('command.ketimpangan-regional');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'ketimpangan-regional',
            'command.ketimpangan-regional',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('ketimpangan-regional.php');

        $this->mergeConfigFrom($packageConfigPath, 'ketimpangan-regional');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'ketimpangan-regional-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'ketimpangan-regional');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/ketimpangan-regional'),
        ], 'ketimpangan-regional-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'ketimpangan-regional');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/ketimpangan-regional'),
        ], 'ketimpangan-regional-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'ketimpangan-regional-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'ketimpangan-regional-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'ketimpangan-regional-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'ketimpangan-regional-seeds');
    }
}
