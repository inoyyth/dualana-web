<?php

namespace App\Providers;

use App\Repositories\Contracts\ExternalPostRepositoryInterface;
use App\Repositories\HttpExternalPostRepository;
use Illuminate\Support\ServiceProvider;

class ExternalPostServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExternalPostRepositoryInterface::class, HttpExternalPostRepository::class);
    }
}
