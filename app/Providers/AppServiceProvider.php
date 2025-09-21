<?php

namespace App\Providers;

use App\Services\Logger\LoggerInterface;
use App\Services\Logger\MongoLogger;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\TaskRepositoryInterface::class,
            \App\Repositories\TaskRepository::class
        );
        $this->app->bind(
            LoggerInterface::class,
            MongoLogger::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
