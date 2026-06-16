<?php

namespace App\Providers;

use App\Models\CompanyProfile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Throwable;

class AppServiceProvider extends ServiceProvider
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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        view()->composer('layouts.app', function ($view) {
            try {
                $view->with('footerProfile', CompanyProfile::first());
            } catch (Throwable $exception) {
                $view->with('footerProfile', null);
            }
        });
    }
}
