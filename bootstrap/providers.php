<?php

use App\Providers\AppServiceProvider;
use App\Providers\ArchitectureServiceProvider;
use App\Providers\HttpClientServiceProvider;
use App\Providers\ExternalPostServiceProvider;

return [
    AppServiceProvider::class,
    ArchitectureServiceProvider::class,
    HttpClientServiceProvider::class,
    ExternalPostServiceProvider::class,
];
