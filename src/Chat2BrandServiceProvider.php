<?php

namespace TimuTech\Chat2Brand;

use TimuTech\Chat2Brand\Chat2Brand;
use TimuTech\Chat2Brand\Contracts\ProviderContract;
use Illuminate\Support\ServiceProvider;

class Chat2BrandServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProviderContract::class, function ($app) {
            return new Chat2Brand(config('services.chat2brand.access_token'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [ProviderContract::class];
    }
}