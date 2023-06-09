<?php

namespace App\Providers;

use App\Contracts\ActivityService as ActivityServiceContract;
use App\Contracts\BoredApiRepository as BoredApiRepositoryContract;
use App\Contracts\LoadActivityDataService as LoadActivityDataServiceContract;
use App\Repositories\BoredApiRepository;
use App\Services\ActivityService;
use App\Services\LoadActivityDataService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BoredApiRepositoryContract::class, BoredApiRepository::class);
        $this->app->bind(LoadActivityDataServiceContract::class, LoadActivityDataService::class);
        $this->app->bind(ActivityServiceContract::class, ActivityService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
