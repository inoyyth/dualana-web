<?php

namespace App\Providers;

use App\Repositories\Contracts\ExternalServiceRepositoryInterface;
use App\Repositories\HttpExternalServiceRepository;
use Illuminate\Support\ServiceProvider;

class ExternalServiceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExternalServiceRepositoryInterface::class, HttpExternalServiceRepository::class);
    }
}
