<?php

namespace App\Providers;

use App\Http\Controllers\CategoriesController;
use App\Interfaces\RepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Services\CategoriesService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
