<?php

namespace App\Providers;

use App\Repositories\Interfaces\PaymentCategoryRepositoryInterface;
use App\Repositories\Interfaces\PaymentRequestRepositoryInterface;
use App\Repositories\PaymentCategoryRepository;
use App\Repositories\PaymentRequestRepository;
use App\Services\PaymentCategoryService;
use App\Services\PaymentRequestService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentCategoryRepositoryInterface::class,PaymentCategoryRepository::class);
        $this->app->bind(PaymentRequestRepositoryInterface::class,PaymentRequestRepository::class);

        $this->app->bind(PaymentCategoryService::class,function ($app) {
            return new PaymentCategoryService($app->make(PaymentCategoryRepositoryInterface::class));
        });

        $this->app->bind(PaymentRequestService::class,function ($app) {
            return new PaymentRequestService($app->make(PaymentRequestRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
