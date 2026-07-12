<?php

use App\Providers\AppServiceProvider;
use App\Providers\ArchitectureServiceProvider;
use App\Providers\HttpClientServiceProvider;
use App\Providers\ExternalPostServiceProvider;
use App\Providers\ExternalPageServiceProvider;
use App\Providers\ExternalClientServiceProvider;
use App\Providers\ExternalServiceServiceProvider;

return [
    AppServiceProvider::class,
    ArchitectureServiceProvider::class,
    HttpClientServiceProvider::class,
    ExternalPostServiceProvider::class,
    ExternalPageServiceProvider::class,
    ExternalClientServiceProvider::class,
    ExternalServiceServiceProvider::class,
];
