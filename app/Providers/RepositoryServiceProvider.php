<?php

namespace App\Providers;

use App\Repository\Category\CategoryRepository;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\EloquentRepositoryInterface;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
