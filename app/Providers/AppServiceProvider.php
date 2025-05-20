<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\{OrderService,
    OrderServiceInterface,
    ProductService,
    ProductServiceInterface
};

use App\Services\Repositories\{OrderRepository,
    OrderRepositoryInterface,
    ProductRepositoryInterface,
    ProductRepository
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
