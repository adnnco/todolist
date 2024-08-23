<?php

namespace App\Providers;

use App\Interfaces\LabelRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Repositories\LabelRepository;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(LabelRepositoryInterface::class, LabelRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
