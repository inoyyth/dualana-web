<?php

namespace App\Providers;

use App\Application\UseCases\GetExternalPages;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Exception;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share contact-us data with all views
        View::composer('*', function ($view) {
            static $contactUs = null;

            if ($contactUs === null) {
                try {
                    $useCase = app(GetExternalPages::class);
                    $contactUs = $useCase->execute(['slug' => 'contact-us']);
                } catch (Exception $e) {
                    // Log or handle error gracefully
                    logger()->error('Failed to load contact-us data: ' . $e->getMessage());
                    $contactUs = null;
                }
            }

            $view->with('contactUs', $contactUs);
        });
    }
}
