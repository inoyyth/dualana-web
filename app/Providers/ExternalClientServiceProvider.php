<?php

namespace App\Providers;

use App\Repositories\Contracts\ExternalClientRepositoryInterface;
use App\Repositories\HttpExternalClientRepository;
use Illuminate\Support\ServiceProvider;

class ExternalClientServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExternalClientRepositoryInterface::class, HttpExternalClientRepository::class);
    }
}
