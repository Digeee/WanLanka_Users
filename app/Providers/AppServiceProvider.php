<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AdminApiService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
 public function register()
{
    $this->app->singleton(AdminApiService::class, function () {
        return new AdminApiService();
    });
}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
