<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::macro('isWith', function (...$parameters) {
            foreach ($parameters as $parameter) {
                if (url()->current() == (!is_array($parameter)
                    ? route($parameter)
                    : route($parameter[0], $parameter[1] ?? []))
                ) {
                    return true;
                }
            }
            return false;
        });
    }
}
