<?php

namespace App\Providers;

use App\Interfaces\PasteServiceInterface;
use App\Services\Pastes\PasteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(PasteServiceInterface::class, PasteService::class);
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
