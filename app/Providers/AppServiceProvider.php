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
        $appUrlHost = parse_url((string) config('app.url'), PHP_URL_HOST);

        if ($this->app->environment('production') || env('VERCEL') || str_ends_with((string) $appUrlHost, 'vercel.app')) {
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
