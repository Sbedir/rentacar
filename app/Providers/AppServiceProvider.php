<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TranslateService;
use App\Services\GenelService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TranslateService::class, function ($app) {
            return new TranslateService();
        });
        $this->app->singleton(GenelService::class, function ($app) {
            return new GenelService();
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
