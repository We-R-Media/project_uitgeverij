<?php

namespace App\Providers;

use Faker\Factory as FakerFactory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('nl_NL');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Model::preventLazyLoading(! app()->isProduction());
        Paginator::defaultView('vendor.pagination.custom');
    }
}
