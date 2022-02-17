<?php

namespace WishCloud\LaravelSitemap;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Routing\ResponseFactory;

class SitemapServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'sitemap');

        $config_file = __DIR__ . '/config/config.php';

        $this->mergeConfigFrom($config_file, 'sitemap');

        $this->publishes([
            $config_file => config_path('sitemap.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/sitemap'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/public' => public_path('vendor/sitemap'),
        ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sitemap', function () {
            return new Sitemap();
        });

        $this->app->alias('sitemap', Sitemap::class);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return ['sitemap', Sitemap::class];
    }
}
