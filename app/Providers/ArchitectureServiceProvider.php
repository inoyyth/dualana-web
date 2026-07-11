<?php

namespace App\Providers;

use App\Repositories\Contracts\ArchitectureOverviewRepositoryInterface;
use App\Repositories\ArrayArchitectureOverviewRepository;
use Illuminate\Support\ServiceProvider;

class ArchitectureServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArchitectureOverviewRepositoryInterface::class, ArrayArchitectureOverviewRepository::class);
    }
}
