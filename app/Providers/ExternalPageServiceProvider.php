<?php

namespace App\Providers;

use App\Repositories\Contracts\ExternalPageRepositoryInterface;
use App\Repositories\HttpExternalPageRepository;
use Illuminate\Support\ServiceProvider;

class ExternalPageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExternalPageRepositoryInterface::class, HttpExternalPageRepository::class);
    }
}
