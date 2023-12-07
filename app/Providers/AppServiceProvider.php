<?php

namespace App\Providers;

use Faker\Factory as FakerFactory;
use Illuminate\Pagination\Paginator;
use App\Services\SearchService;
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

        $this->app->singleton(SearchService::class, function ($app) {
            return new SearchService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.custom');
    }
}
