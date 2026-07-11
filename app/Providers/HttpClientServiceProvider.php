<?php

namespace App\Providers;

use App\Infrastructure\Http\LaravelRestClient;
use App\Infrastructure\Http\RestClientInterface;
use Illuminate\Support\ServiceProvider;

class HttpClientServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind as transient so consumers get a fresh, isolated state builder instance.
        $this->app->bind(RestClientInterface::class, LaravelRestClient::class);
    }
}
